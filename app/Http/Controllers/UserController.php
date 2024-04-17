<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Check admin
        abort_unless(Gate::allows('admin'), 403);
        try {
            $users = $this->userService->userList();
            return view('pages.user.index', compact('users'));
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', $e->getMessage() ?? 'Something went wrong!');
        }
    }

    /**
     * Display the users profile.
     */
    public function profile(Request $request)
    {
        // Check user
        abort_unless(Gate::allows('user'), 403);
        $user = $request->user();
        $user->load('userInfo:user_id,address,phone,dob,nid');
        return view('pages.user.profile', compact('user'));
    }

    /**
     * Show change user password form.
     */
    public function showChangePassword()
    {
        // Check user
        abort_unless(Gate::allows('user'), 403);
        return view('pages.user.change-password');
    }

    /**
     * Show change user password form.
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        // Check user
        abort_unless(Gate::allows('user'), 403);
        try {
            $updatePassword = $this->userService->updatePassword($request);
            if ($updatePassword) {
                return response()->json(['message' => 'Password changed successfully.', 'success' => true]);
            }
            return response()->json(['message' => 'Password mismatch!', 'success' => false], 406);
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', $e->getMessage() ?? 'Something went wrong!');
        }
    }
}
