<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with('author', 'category')
            ->withAvg('ratings', 'value')
            ->withCount('ratings');

        if ($search = $request->search) {
            $query->where('name', 'like', "%$search%")
                ->orWhereHas('author', fn($q) => $q->where('name', 'like', "%$search%"));
        }

        $perPage = $request->input('limit', 10);
        $books = $query->orderByDesc('ratings_avg_value')->paginate($perPage);

        return view('books.index', compact('books'));
    }
}
