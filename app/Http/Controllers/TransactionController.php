<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use PhpParser\Node\Stmt\TryCatch;

class TransactionController extends Controller
{
    public function index()
    {
        // ambil database untuk memfilter admin tidak bisa pinjam dan user yang blm di approve tidak bisa pinjam
        $users = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $books = Book::all();

        return view('contents.transaction.transaction', [
            'users' => $users,
            'books' => $books,
        ]);
    }

    public function store(Request $request)
    {
        // buat karbon untuk rent_date dan return_date(otomatis 3hari setelah peminjaman)
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();

        // kita ambil data status nya dengan only jika instock boleh pinjam jika tidak tidak bisa
        $book = Book::findOrFail($request->book_id)->only('status');

        if ($book['status'] != 'in stock') {

            Session::flash('message', "Can't rent, the book is not available");
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        } else {
            // untuk menghitung
            $count = Transaction::where('user_id', $request->user_id)->where('actual_return_date', null)->count();

            if ($count >= 3) {
                Session::flash('message', "Can't rent, user has reach limit of book");
                Session::flash('alert-class', 'alert-danger');
                return redirect()->back();
            } else {
                try {
                    DB::beginTransaction();

                    // process insert to transaction table
                    Transaction::create($request->all());

                    // process update book table
                    $book = Book::findOrFail($request->book_id);
                    $book->status = 'not available';
                    $book->save();

                    // Jika berhasil maka di commit
                    DB::commit();

                    Session::flash('message', "Rent Book Success");
                    Session::flash('alert-class', 'alert-success');
                    return redirect()->back();
                } catch (\Throwable $th) {
                    // Jika gagal akan di rollback
                    DB::rollBack();
                }
            }
        }
    }

    public function returnBook()
    {
        // ambil database untuk memfilter admin tidak bisa pinjam dan user yang blm di approve tidak bisa pinjam
        $users = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $books = Book::all();

        return view('contents.transaction.return-book', [
            'users' => $users,
            'books' => $books,
        ]);
    }

    public function saveReturnBook(Request $request)
    {
        // user dan buku yg dipilih untuk di return benar maka berhasil return book
        // jika user dan buku yg dipilih untuk di return salah maka error notice
        $transaction = Transaction::where('user_id', $request->user_id)->where('book_id', $request->book_id)->where('actual_return_date', null);

        // ambil data
        $transactionData = $transaction->first();

        // hitung data
        $countData = $transaction->count();

        if ($countData == 1) {
            // return book
            $transactionData->actual_return_date = Carbon::now()->toDateString();
            $transactionData->save();

            // process update book table
            $book = Book::findOrFail($request->book_id);
            $book->status = 'in stock';
            $book->save();

            Session::flash('message', 'The book is returned successfully');
            Session::flash('alert-class', 'alert-success');
            return back();
        } else {
            // error notice muncul
            Session::flash('message', 'There is error in process');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }
    }
}
