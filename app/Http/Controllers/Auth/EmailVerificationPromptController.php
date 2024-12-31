<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        if ($request->user()->is_admin)
            return $request->user()->hasVerifiedEmail()
                ? redirect()->intended(RouteServiceProvider::ADMINHOME)
                : view('auth.verify-email');
        else
            return $request->user()->hasVerifiedEmail()
                ? redirect()->intended(RouteServiceProvider::USERHOME)
                : view('auth.verify-email');

    }
}
