<?php

namespace App\Http\Controllers;

use App\Models\{
    Book,
    Service
};
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return route('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BookRequest  $request
     * @return RedirectResponse
     */
    public function store(BookRequest $request)
    {
        $new_book = $request->validated();
        $service = Service::findOrFail($new_book['service_id']);
        $new_book = array_merge($new_book, [
            'service_name' => $service->name,
            'service_vehicle' => $service->vehicle,
            'service_size' => $service->size,
            'service_service' => $service->service,
            'service_type' => $service->type,
            'service_cost' => $service->cost,
        ]);
        $new_book['code'] = Book::generateCode($new_book['date']);

        $book = $request->user()->books()->create($new_book);

        // return route('books.show', $book->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function confirmNewBook(Request $request, $id)
    {
        $this->validate($request, [
            'accepted' => ['required', 'boolean'],
            'start_at' => ['required', 'date'],
            'end_at' => ['required', 'date'],
        ]);

        $book = Book::findOrFail($id);
        $next_possible_states = $book->getNextPossibleStates();
        if ($request->accepted) {
            // Validate new schedule
            $schedule = Schedule::whereDate('start_at', '>=', $request->start_at)
                                ->whereDate('end_at', '<=', $request->end_at)
                                ->where('reserved', 0)
                                ->first();
            if ($schedule) {
                return response()->withErrors('message', 'Maaf, jadwal ini telah dipesan. Silahkan pilih jadwal yang lain');
            }

            $schedule = Schedule::updateOrCreate(
                [
                    'book_id' => $book->id,
                    'book_code' => $book->code,
                ],
                [
                    'duration' => Schedule::getDuration($request->start_at, $request->end_at),
                    'start_at' => $request->start_at,
                    'end_at' => $request->end_at,
                    'reserved' => 1,
                ]
            );

            //!! $book->receipt = $receipt;
            // $book->state = $next_possible_states[0];
            // $book->date = $request->start_at;
            // $book->save();
            // notify customer via mail
            // return back with success notify
        }
        else {
            //!! $book->state = $next_possible_states[1];
            // $book->save();
            // notify customer via mail
            // return back with success notify
        }
    }

    /**
     * End the book
     *
     * @param int $id
     * @param string $next_state
     * @return \Illuminate\Http\Response
     */
    public function end($id, $next_state)
    {
        $book = Book::findOrFail($id);

        if (request()->user()->cannot('finish', Book::class)) {
            return back()->withErrors('message', 'Maaf, Anda tidak memiliki wewenang untuk menyelesaikan bookingan ini.');
        }

        $next_possible_states = $book->getNextPossibleStates();
        if (! in_array($next_state, $next_possible_states)) {
            return back()->withErrors('message', 'Maaf, Sistem tidak mengenali status bookingan yang diminta.');
        }

        $book->update([ 'state' => $next_possible_states[ array_search($next_state, $next_possible_states) ] ]);

        //!! notify customer via mail
        // return route('books.show', $book->id) // with success
    }

    /**
     * Cancel the book
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        $book = Book::with('schedule')->findOrFail($id);

        if (request()->user()->cannot('cancel', $book)) {
            return back()->withErrors('message', 'Maaf, Anda tidak memiliki wewenang untuk membatalkan bookingan ini.');
        }

        if ($book->schedule) {
            $book->schedule->update([ 'reserved' => 0 ]);
        }

        $next_possible_states = $book->getNextPossibleStates();
        $book->update([ 'state' => end($next_possible_states) ]);

        //!! notify admin via mail
        // return route('books.show', $book->id) // with success
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

        // return view('books.receipt-view', $book);
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
