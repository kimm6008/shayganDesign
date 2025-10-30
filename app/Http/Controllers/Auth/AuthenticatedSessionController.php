<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\party;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use function Laravel\Prompts\password;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }
    public function userLogin(): View
    {
        return view('sections.login');
    }
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $party = party::where('mobile', $request->mobile)->first();
        if ($party) {
            $request->authenticate($party);
            Auth::login($party->user()->first(), $request->remember);

            $request->session()->regenerate();
            if ($request->user()->is_admin)
                return redirect()->intended(RouteServiceProvider::ADMINHOME);
            else
                return redirect()->intended(RouteServiceProvider::USERHOME);
        } else {
            throw ValidationException::withMessages([
                'mobile' => trans('auth.failed'),
            ]);
        }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
