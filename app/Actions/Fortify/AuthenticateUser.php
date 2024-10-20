<?php


namespace App\Actions\Fortify;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticateUser
{
    public function authenticate($request)
    {

        $username = $request->post(config('fortify.username'));
        $password = $request->post('password');

        $user = Admin::where('username', '=', $username)
            ->orwhere('email', '=', $username)
            ->orwhere('phone', '=', $username)->first();

        if ($user && Hash::check($password, $user->password)) {
            // Auth::guard('admin')->login($user);
            return $user;
        }
        return false;
    }
}
