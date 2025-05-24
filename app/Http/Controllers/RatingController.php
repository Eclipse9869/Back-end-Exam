<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    //
    public function create()
    {
        $authors = Author::whereHas('books')
                     ->orderBy('created_at', 'desc')
                     ->get();
        return view('ratings.create', compact('authors'));
    }

    // RatingController@store
    public function store(Request $request)
    {
        $request->validate([
            'author_id' => 'required|exists:authors,id',
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|between:1,10',
        ]);

        Rating::create([
            'book_id' => $request->book_id,
            'value' => $request->rating,
        ]);

        return redirect('/');
    }
}
