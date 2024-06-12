<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $existingUser = User::where('email', $request->email)->first();
        if ($existingUser) {
            return redirect()->back()->with('error', 'Email sudah dipakai');
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('/login');
    }

    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
{
    $credentials = [
        'email' => $request->email,
        'password' => $request->password,
    ];

    if (Auth::attempt($credentials)) {
        return redirect()->route('items.index'); // Mengarahkan pengguna ke halaman utama setelah login
    }

    return back()->with('error','Email dan Password tidak cocok');
}

public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login'); // Mengarahkan pengguna ke halaman login setelah logout
}
}
