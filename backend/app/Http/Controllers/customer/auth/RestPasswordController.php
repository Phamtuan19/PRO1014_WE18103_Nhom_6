<?php

namespace App\Http\Controllers\customer\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestPasswordController extends Controller
{
    public function index()
    {
        return view('customer.auth.reset-password');
    }

    public function verifyPassword($token)
    {
        $checkUserToken = User::where('token_verify', $token)->get()[0];
        if($checkUserToken->count() > 0){
            return view('customer.auth.password.confirm');
        }
    }
}
