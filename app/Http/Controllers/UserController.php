<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        //relasikan controller user dengan logtransaction
        $LogTransaction = Transaction::with(['user', 'book'])->where('user_id', Auth::user()->id)->get();
        return view('contents.user.profile', [
            'LogTransaction' => $LogTransaction,
        ]);
    }

    public function index()
    {
        // ambil data dari database
        // $users = User::all();
        $users = User::where('role_id', 2)->where('status', 'active')->get();
        $roles = Role::all();
        return view('contents.user.user', [
            'users' => $users,
            'roles' => $roles,
        ]);
    }

    public function registeredUser()
    {
        // ambil data user dari database untuk user inactive
        $registeredUsers = User::where('status', 'inactive')->where('role_id', 2)->get();

        return view('contents.user.registered-user', [
            'registeredUsers' => $registeredUsers,
        ]);
    }

    public function show($slug)
    {
        // ambil data user
        $user = User::where('slug', $slug)->first();

        //relasikan controller user dengan logtransaction
        $LogTransaction = Transaction::with(['user', 'book'])->where('user_id', $user->id)->get();

        return view('contents.user.user-detail', [
            'user' => $user,
            'LogTransaction' => $LogTransaction,
        ]);
    }

    public function approve($slug)
    {
        // ambil data dari database
        $user = User::where('slug', $slug)->first();

        // untuk update data approve dan save data
        $user->status = 'active';
        $user->save();

        
        return back()->with('status', 'User Approved Succesfully');
        // return redirect('user-detail/' . $slug)->with('status', 'User Approved Succesfully');
        
    }

    public function delete($slug)
    {
        // cari datanya untuk hapus
        $user = User::where('slug', $slug)->first();
        $user->delete();

        return back()->with('status', 'Berhasil menghapus user');
        // return redirect('users')->with('status', 'Berhasil menghapus user');
    }

    public function bannedUser()
    {
        // untuk liat user yg ter delete
        $bannedUsers = User::onlyTrashed()->get();
        return view('contents.user.user-banned', [
            'bannedUsers' => $bannedUsers,
        ]);
    }

    public function restore($slug)
    {
        $user = User::withTrashed()->where('slug', $slug)->first();
        $user->restore();
        return redirect('users')->with('status', 'Berhasil restore user');
    }
}
