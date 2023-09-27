<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Cviebrock\EloquentSluggable\SluggableObserver;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class BookController extends Controller
{
    public function index()
    {
        // ambil data dari database
        $books = Book::all();
        return view('contents.book.book', ['books' => $books]);
    }

    public function add()
    {
        // ambil data dari table database category
        $categories = Category::all();
        
        // panggil halaman addbook dan $categories diatas
        return view('contents.book.book-add', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        // validasi agar data tidak double
        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:255',
            'title' => 'required|max:255',
        ]);

        //upload image (post)
        $newName = null;
        if($request->file('image')) 
        {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
        }

        // masukin database image
        $request['cover'] = $newName;
    
        // create kategori
        $book = Book::create($request->all());
        
        // mensinkronkan untuk mengisi table book-kategori
        $book->categories()->sync($request->categories);
        
        return redirect('books')->with('status', 'Berhasil menambah buku');
    }

    public function edit($slug)
    {
        // Ambil data buku yg sedang di edit
        $book = Book::where('slug', $slug)->first();
        
        // Ambil data kategori untuk buku
        $categories = Category::all();
        
        // jangan lupa kirim $categorires ke view dan $books
        return view('contents.book.book-edit', ['categories' => $categories, 'book' => $book]);
    }

    public function update(Request $request, $slug)
    {
        // update image
        if($request->file('image')) 
        {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
            $request['cover'] = $newName;
        }

        
        // update buku
        $book = Book::where('slug', $slug)->first();
        $book->update($request->all());
        
        if($request->categories)
        {
            // sinkronkan
            $book->categories()->sync($request->categories);

        }

        // redirect
        return redirect('books')->with('status', 'Berhasil mengupdate buku');
    }

    public function delete($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $book->delete();
        return redirect('books')->with('status', 'Berhasil menghapus buku');
    }

    public function deletedBook()
    {
        $deletedBooks = Book::onlyTrashed()->get();
        return view('contents.book.book-deleted-list', ['deletedBooks' => $deletedBooks]);
    }
    
    public function restore($slug)
    {
        $book = Book::withTrashed()->where('slug', $slug)->first();
        $book->restore();
        return redirect('books')->with('status', 'Berhasil restore buku');
    }
    
}
