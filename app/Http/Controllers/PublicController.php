<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        // ambil data dari database
        $categories = Category::all();

        // buat eloquent untuk mendapatkan data di pencarian
        if ($request->category || $request->title) {
            $books = Book::where('title', 'like', '%' . $request->title . '%')
                ->orwhereHas('categories', function ($q) use ($request) {
                    $q->where('categories.id', $request->category);
                })->get();
        } else {
            $books = Book::all();
        }

        return view('book-list', [
            'books' => $books,
            'categories' => $categories,
        ]);
    }
}
