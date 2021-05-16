<?php

namespace App\Http\Controllers;

use App\Models\{
    Book,
    Service,
    User
};
use App\Http\Requests\{
    BookRequest,
    CancelRequest
};
use App\Notifications\{
    NewBook,
    ConfirmBook,
    BookClosed,
    BookIsCanceled,
};
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $books = Book::latest()->when($user->isCustomer(), function($query) use($user) {
            return $query->where('customer_id', $user->id);
        })->when($request->filled('state'), function($query) use($request) {
            if ($request->state == 'canceled') {
                return $query->whereIn('state', ['canceled', 'finished']);
            }
            return $query->where('state', $request->state);
        })->when($request->filled('today'), function($query) use($request) {
            return $query->whereDate('schedule_start_at', today());
        })->when($request->filled('review'), function($query) use($request) {
            return $query->where('state', 'finished')->doesntHave('review');
        })->get();

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::get(['id', 'name', 'cost'])->transform(function($service) {
            $service->cost = toRupiah($service->cost);
            return $service;
        });
        $user = request()->user()->makeHidden(['id', 'username', 'type', 'email', 'created_at', 'updated_at']);
        $times = Book::getTimes();
        return view('books.create', compact('services', 'user', 'times'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $new_book = $request->validated();

        $new_book['schedule_start_at'] = date('Y-m-d H:i:s', strtotime($new_book['date'] .' '. $new_book['time'] .':00'));
        unset($new_book['date']);
        unset($new_book['time']);

        $service = Service::findOrFail($new_book['service_id']);

        $new_book = array_merge($new_book, [
            'service_name' => $service->name,
            'service_vehicle' => $service->vehicle,
            'service_size' => $service->size,
            'service_service' => $service->service,
            'service_type' => $service->type,
            'service_cost' => $service->cost,
        ]);

        $new_book = $request->user()->books()->create($new_book);

        User::getAdmin()->notify((new NewBook($new_book)));

        return redirect()->route('books.show', $new_book->id)->with('message', 'Bookingan Anda berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        $this->authorize('view', $book);
        $is_customer = request()->user()->isCustomer();
        if ($is_customer) {
            return view('books.show', compact('book', 'is_customer'));
        }
        else {
            if ($book->is_finished_or_canceled) {
                return view('books.show', compact('book', 'is_customer'));
            }
            $services = Service::get(['id', 'name', 'cost'])->transform(function($service) {
                $service->cost = toRupiah($service->cost);
                return $service;
            });
            $above_or_equal_this_time = timeFormat($book->schedule_start_at);
            $times = Book::getTimes($above_or_equal_this_time);
            if ($book->is_new) {
                return view('books.confirm', compact('book', 'services', 'times'));
            }
            else {
                return view('books.show', compact('book', 'is_customer', 'services', 'times'));
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Confirm new book
     *
     * @param Request $request
     * @param int $id
     * @return return type
     */
    public function confirmNewBook(BookRequest $request, $id)
    {
        $book = Book::findOrFail($id);
        $update_book = $request->validated();

        $update_book['invoice_number'] = 'INV/'. date('Ymd', strtotime($update_book['date'])) .'/'. mt_rand(10000000,99999999);
        $update_book['schedule_start_at'] = date('Y-m-d h:i:s', strtotime($update_book['date'] .' '. $update_book['time'] .':00'));
        $update_book['schedule_end_at'] = date('Y-m-d h:i:s', strtotime($update_book['date'] .' '. $update_book['end_time'] .':00'));
        unset($update_book['date']);
        unset($update_book['time']);
        unset($update_book['end_time']);

        if ($book->service_id != $update_book['service_id']) {
            $service = Service::findOrFail($update_book['service_id']);

            $update_book = array_merge($update_book, [
                'service_name' => $service->name,
                'service_vehicle' => $service->vehicle,
                'service_size' => $service->size,
                'service_service' => $service->service,
                'service_type' => $service->type,
                'service_cost' => $service->cost,

                'state' => Book::STATE[1]
            ]);
        }
        else {
            $update_book['state'] = Book::STATE[1];
        }

        $book->update($update_book);

        User::findOrFail($book->customer_id)->notify((new ConfirmBook($book)));

        return redirect()->route('books.show', $book->id)->with('message', 'Bookingan berhasil dikonfirmasi');
    }

    /**
     * End the book
     *
     * @param int $id
     * @param string $next_state
     * @return \Illuminate\Http\Response
     */
    public function end(BookRequest $request, $id)
    {
        $book = Book::findOrFail($id);
        $this->authorize('finish', $book);
        $update_book = $request->validated();

        $update_book['schedule_start_at'] = date('Y-m-d h:i:s', strtotime($update_book['date'] .' '. $update_book['time'] .':00'));
        $update_book['schedule_end_at'] = date('Y-m-d h:i:s', strtotime($update_book['date'] .' '. $update_book['end_time'] .':00'));
        unset($update_book['date']);
        unset($update_book['time']);
        unset($update_book['end_time']);

        if ($book->service_id != $update_book['service_id']) {
            $service = Service::findOrFail($update_book['service_id']);

            $update_book = array_merge($update_book, [
                'service_name' => $service->name,
                'service_vehicle' => $service->vehicle,
                'service_size' => $service->size,
                'service_service' => $service->service,
                'service_type' => $service->type,
                'service_cost' => $service->cost,

                'state' => Book::STATE[2]
            ]);
        }
        else {
            $update_book['state'] = Book::STATE[2];
        }

        $book->update($update_book);
        User::findOrFail($book->customer_id)->notify((new BookClosed($book)));

        //!! notify customer via mail
        return redirect()->route('books.show', $book->id)->with('message', 'Bookingan berhasil diselesaikan!');
    }

    /**
     * Cancel the book
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function cancel(CancelRequest $request, $id)
    {
        $book = Book::findOrFail($id);
        $this->authorize('cancel', $book);
        $to_cancel = $request->validated();
        $to_cancel['state'] = $request->user()->isCustomer()
            ? Book::STATE[4]
            : Book::STATE[3];

        $book->update($to_cancel);

        $canceled_book = new BookIsCanceled($book);
        User::findOrFail($book->customer_id)->notify($canceled_book);
        User::getAdmin()->notify($canceled_book);

        return redirect()->route('books.show', $book->id)->with('message', 'Bookingan berhasil dibatalkan!');
    }

    /**
     * View invoice of the book
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function viewInvoice($id)
    {
        $book = Book::findOrFail($id);
        $this->authorize('viewInvoice', $book);

        return view('books.invoice', compact('book'));
    }

    /**
     * Edit state of the book
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function editStateToCancel($id)
    {
        $book = Book::findOrFail($id);
        $this->authorize('cancel', $book);

        return view('books.cancel', compact('id'));
    }

    /**
     * Download receipt of the book
     *
     * @param int $id
     * @return return type
     */
    // public function downloadReceipt($id)
    // {
    //     $book = Book::findOrFail($id);
    //     // code...
    // }
}
