<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    //
    public function index()
    {
        $authors = Author::with(['books.ratings' => function ($query) {
            $query->where('value', '>', 5);
        }])->get()->map(function ($author) {
            $voters = $author->books->flatMap->ratings->count();
            return ['name' => $author->name, 'voters' => $voters];
        })->sortByDesc('voters')->take(10);

        return view('authors.index', ['authors' => $authors]);
    }
}
