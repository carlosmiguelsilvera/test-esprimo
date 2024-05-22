<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('username', 'password'))) {
            return redirect()->back();
        }
        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->back();
        }
        if(empty($user->token)){
            $token = $user->createToken('auth_token')->plainTextToken;
            $user->update(["token" => $token]);
        }
        Auth::login($user);

        return redirect()->route("home");
    }
}
