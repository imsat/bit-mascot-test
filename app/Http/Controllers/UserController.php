<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('userInfo:user_id,address,phone,dob,nid')
            ->select(['id', 'first_name', 'last_name', 'email'])
            ->search()
            ->latest()
            ->paginate();
        return view('pages.user.index', compact('users'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user->load('userInfo:user_id,address,phone,dob,nid');
        return view('pages.user.show', compact('user'));
    }

    /**
     * Show change user password form.
     */
    public function showChangePassword()
    {
        return view('pages.user.change-password');
    }
}
