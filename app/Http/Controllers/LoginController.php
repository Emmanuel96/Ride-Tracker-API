<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class LoginController extends Controller
{
    public function postLogin(Request $request){
        // $credentials = $request->only('email', 'password');

        info('This is the password: '.$request->password);
        info('This is the email: '.$request->email);
        $email = $request->email;
        $password = $request->password;

        // return User::where('user_email', '=', $email)
        //             ->where('user_password', '=', $password)->first();

        if (Auth::attempt(['user_email' => $email, 'password' => 'emmanuel96'])) {
            // Authentication passed...
            $user = Auth::user();
            info($user);

            return $user;
        }
        else{
            return null;

        }
    }
}
