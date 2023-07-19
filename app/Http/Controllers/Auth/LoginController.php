<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/admin';

    public function redirectTo()
    {
        if (auth()->user()->roles == 'adm') {
            return '/admin';
        } elseif (auth()->user()->roles == 'petugas') {
            return '/petugas';
        } elseif (auth()->user()->roles == 'siswa') {
            return '/siswa';
        } elseif (auth()->user()->roles == 'kepsek') {
            return '/kepsek';
        } else {
            return '/home';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username()
{
    return 'username';
}
}
