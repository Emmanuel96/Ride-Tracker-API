<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    protected function getAllUsers()
    {
        $users = User::join('company', 'company_id', 'user_company_id')->get();

        return $users;
    }

    protected function deleteUser($id)
    {
        $user = User::find($id);

        $user->user_status = -10;

        $user->save();

        return 'Deleted successfully';
    }

    public function updateUser(Request $request)
    {
        info($_POST['user_id']);
        $user = User::where('user_id', '=', $request->user_id)->first();

        $user->user_name = $request->user_name;
        $user->user_email = $request->user_email;
        $user->user_first_name = $request->user_first_name;
        $user->user_last_name = $request->user_last_name;
        $user->user_company_id = $request->user_company_id;

        $user->save();

        return $user;
    }



    protected function createUser(Request $request)
    {
        //first create a new user
        $user = User::create([
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'user_password' => app('hash')->make($request->user_password),
            'user_first_name' => $request->user_first_name,
            'user_last_name' => $request->user_last_name,
            'user_role' => 2,
            'user_company_id' => $request->user_company_id
        ]);

        return $user;
    }

    protected function getUser($id)
    {
        $user = User::find($id);

        return $user;
    }
}
