<?php

namespace App\Http\Controllers;

use App\Models\{
    Book,
    Review
};
use App\Http\Requests\ReviewRequest;
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
     * @param  int  $book_id
     * @return \Illuminate\Http\Response
     */
    public function create($book_id)
    {
        $book = Book::findOrFail($book_id);
        $this->authorize('createReview', $book);
        return view('reviews.create', compact('book'));
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

        $book = Book::findOrFail($book_id);
        $this->authorize('createReview', $book);
        $book->review()->create($new_review);

        return redirect()->route('books.show', $book->id)->with('message', 'Review berhasil ditambahkan!');
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
