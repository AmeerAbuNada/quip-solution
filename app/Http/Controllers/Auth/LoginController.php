<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function showLogin()
    {
        return response()->view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $info = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        if(Auth::attempt($info)) {
            return response()->json([
                'message' => 'Logged In Successfully!',
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => 'Wrong email or password.'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function logout(Request $request) {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
