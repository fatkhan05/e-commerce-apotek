<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuntheticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

use function PHPUnit\Framework\returnSelf;

class LoginController extends Controller
{
    // use AuntheticatesUsers;
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return redirect()->intended('/home')->with('success', 'Login Success');
        }

        return redirect()->back()->withErrors([
            // 'email' => 'The provided credentials do not match our records.',
            'email' => 'Mohon maaf email anda belum terdaftar',
            'password' => 'Password yang anda masukkan tidak tepat',
        ]);                                         
    }

    public function redirectTo()
    {
        if (Auth::user()->is_admin == 'admin') {
            $this->redirectTo = route('Obat');
            return $this->redirectTo;
        } else {
            $this->redirectTo = route('Obat', Auth::user()->id);
            return $this->redirectTo;
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
