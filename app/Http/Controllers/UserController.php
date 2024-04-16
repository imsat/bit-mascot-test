<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        abort_unless(auth()->id() === $user->id, '419', 'Unauthorized');
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

    /**
     * Show change user password form.
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string',
            'confirm_password' => 'required|string',
        ]);

        $user = $request->user();
        $data = $request->only('old_password', 'new_password', 'confirm_password');

        if (Hash::check($data['old_password'], $user->password)) {
            $user->update([
                'password' => Hash::make($data['confirm_password']),
            ]);
            return response()->json(['message' => 'Password changed successfully.', 'success' => true]);
        }

        return response()->json(['message' => 'Password mismatch!', 'success' => false], 406);

    }
}
