<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

class ResetPasswordController extends Controller
{
    public function showForgotPassword()
    {
        return response()->view('auth.forgot-password');
    }

    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $status = Password::sendResetLink(
            $request->only('email')
        );
        return response()->json([
            'message' => __($status),
        ], $status === Password::RESET_LINK_SENT ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    public function showResetPassword($token) {
        return response()->view('auth.reset-password', ['token' => $token]);
    }

    public function resetPassword(ResetPasswordRequest $request) {
     
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );

        return response()->json([
            'message' => __($status),
        ], $status === Password::PASSWORD_RESET ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
