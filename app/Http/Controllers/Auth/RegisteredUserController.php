<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\SettingHelper;
use App\Models\party;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {

        //return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        //return "YES";
        /*$request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);*/
        DB::beginTransaction();
        try {
            $party=party::create([
                'uuid' => Str::uuid(),
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'fullname' => $request->firstname.' '.$request->lastname,
                'city_id' =>$request->city_id,
                'postalcode' => $request->postalcode,
                'address' => $request->address,
                'mobile' => $request->mobile,
            ]);
           // die('uesssssss');
            $user = User::create([
                'party_id' => $party->id,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));
            Auth::login($user);
           /*


            if ($user->is_admin)
                return redirect(RouteServiceProvider::ADMINHOME);
            else
                return redirect(RouteServiceProvider::USERHOME);*/
        } catch (Exception $exception) {
            SettingHelper::RedirectWithErrorMessage('/','خطا در ثبت کاربری');
            DB::rollBack();
        }
        DB::commit();
        return redirect(RouteServiceProvider::USERHOME);

    }
}
