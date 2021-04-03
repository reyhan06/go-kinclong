<?php

namespace App\Http\Controllers;

use App\Models\{
    Book,
    Review
};
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;

class ReviewController extends Controller
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
        // return view('reviews.create', $array);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ReviewRequest  $request
     * @param  int  $book_id
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewRequest $request, $book_id)
    {
        $new_review = $request->validated();

        $book = Book::withCount('review')->findOrFail($book_id);
        if ($book->review_count != 0) {
            return back()->withErrors('message', 'Maaf, Anda tidak dapat membuat ulasan baru karena bookingan ini sudah memiliki ulasan.');
        }

        $review = $book->review()->create($new_review);

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
}
