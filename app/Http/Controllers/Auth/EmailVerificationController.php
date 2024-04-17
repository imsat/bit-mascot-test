<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\EmailVerificationService;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    protected $emailVerificationService;

    public function __construct(EmailVerificationService $emailVerificationService)
    {
        $this->emailVerificationService = $emailVerificationService;
    }

    /**
     * Show the application's email verification form.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function showEmailVerification()
    {
        return view('pages.auth.email-verification');
    }

    public function emailVerification(Request $request)
    {
        // Validate the verification code
        $request->validate([
            'verification_code' => 'required|size:6',
        ]);
        try {
            $emailVerify = $this->emailVerificationService->verify($request);
            if ($emailVerify) {
                // Redirect user
                if ($request->user()->isAdmin()) {
                    return redirect()->route('users.index')->with('success', 'Verification successful');
                }
                return redirect()->route('users.profile')->with('success', 'Verification successful');
            }
            // If verification fails, redirect back with error message
            return back()->withErrors(['verification_code' => 'Invalid verification code.']);

        } catch (\Exception $e) {
            return redirect()->back()->with('failed', $e->getMessage() ?? 'Something went wrong!');
        }


    }
}
