<?php

namespace App\Http\Controllers;

use App\Models\Book;
// use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = request()->user();
        $is_customer = $user->isCustomer();
        $books = Book::latest()->when($is_customer, function($query) use($user) {
            return $query->where('customer_id', $user->id);
        });

        $data = [
            'today' => (clone $books)->where('state', 'processed')->whereDate('schedule_start_at', today())->get(),
            'new' => (clone $books)->where('state', 'new')->count(),
            'processed' => (clone $books)->where('state', 'processed')->count(),
            'finished' => (clone $books)->where('state', 'finished')->count(),
            'canceled' => (clone $books)->whereIn('state', ['canceled', 'failed'])->count(),
            'lists' => (clone $books)->simplePaginate(15)
        ];

        if ($is_customer) {
            $data['today'] = (clone $books)->whereDate('schedule_start_at', today())->count();
            $data['review'] = (clone $books)->where('state', 'finished')->doesntHave('review')->count();
        }

        return view($user->type .'.dashboard', compact('data'));
    }
}
