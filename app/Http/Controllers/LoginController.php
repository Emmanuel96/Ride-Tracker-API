<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function postLogin(Request $request){
        $credentials = $request->only('email', 'password');

        info('This is the password: '.$request->password);
        info('This is the email: '.$request->email);
        if (Auth::attempt(['user_email' => $request->email, 'user_password' => $request->password])) {
            // Authentication passed...
            $response = [
                'auth_user'=>Auth::user(),
                'text' => 'User has been authenticated successfully'
            ];
            return $response;
        }
        else{
            $response = [
                'auth_user' => 'Credentials do not match',
                'text' => 'Credentials do not match'
            ];

        }
    }
}
