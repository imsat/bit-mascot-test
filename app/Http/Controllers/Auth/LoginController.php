<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\LoginService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller implements HasMiddleware
{
    protected $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('guest', except: ['logout']),
        ];
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        try {
            $isLogin = $this->loginService->authenticate($request);
            if ($isLogin) {
                if (auth()->user()->is_admin === 1) {
                    return redirect()->route('users.index');
                }
                return redirect()->route('users.profile');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', $e->getMessage() ?? 'Something went wrong!');
        }
    }

    public function logout(Request $request)
    {
        try {
            $this->loginService->logout($request);
            return redirect()->back()->with('success', 'Logout successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', $e->getMessage() ?? 'Something went wrong!');
        }
    }
}
