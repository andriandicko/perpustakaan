<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Membuat Count
        $transactionCount = Transaction::count();
        $categoryCount = Category::count();
        $bookCount = Book::count();
        $userCount = User::count();

        return view('contents.dashboard', ['transaction_count' => $transactionCount, 'category_count' => $categoryCount, 'book_count' => $bookCount, 'user_count' => $userCount]);
    }
}

