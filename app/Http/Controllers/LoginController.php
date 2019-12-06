<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class LoginController extends Controller
{
    public function postLogin(Request $request)
    {
        // $credentials = $request->only('email', 'password');

        info('This is the password: ' . $request->password);
        info('This is the email: ' . $request->email);
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['user_email' => $email, 'password' => $password])) {
            // Authentication passed...
            $user = Auth::user();
            $tokenResult = $user->createToken($user->user_email . '-' . now());
            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'user' => $user
            ]);
        } else {
            return response()->json([
                'message' => 'Invalid credentials'
            ]);
        }
    }
}
