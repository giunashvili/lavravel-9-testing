<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        $data = $request->validated();

        if(auth()->attempt($data))
        {
            $request->session()->regenerate();
            return redirect()->intended(route('company.index'));
        }

        return back()->withErrors([
            'email' => 'Please provide correct credentials.',
        ]);
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login.get'));
    }
}
