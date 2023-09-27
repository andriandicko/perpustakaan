<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('contents.category.category', ['categories' => $categories]);
    }

    public function add()
    {
        return view('contents.category.category-add');
    }

    public function store(Request $request)
    {
        // validasi agar data tidak double
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]);

        // create kategori
        $category = Category::create($request->all());
        return redirect('categories')->with('status', 'Berhasil menambah kategori');
    }

    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('contents.category.category-edit', ['category' => $category]);
    }

    // Request berfungsi untuk mendapatkan apa yang dikirim dari form
    public function update(Request $request, $slug)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100',
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('categories')->with('status', 'Berhasil mengubah kategori');
    }
    
    public function delete($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect('categories')->with('status', 'Berhasil menghapus kategori');
    }
    
    public function deletedCategory()
    {
        $deletedCategories = Category::onlyTrashed()->get();
        return view('contents.category.category-deleted-list', ['deletedCategories' => $deletedCategories]);
    }
    
    public function restore($slug)
    {
        $category = Category::withTrashed()->where('slug', $slug)->first();
        $category->restore();
        return redirect('categories')->with('status', 'Berhasil restore kategori');
    }
    
    // public function destroy($slug)
    // {
    //     $category = Category::where('slug', $slug)->first();
    //     $category->delete();
    //     return redirect('categories')->with('status', 'Berhasil menghapus kategori');
    // }

}