<?php

namespace App\Http\Controllers\customer\auth;

use App\Models\User;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use App\Providers\RouteServiceProvider;

use App\Http\Requests\admin\User\CreateRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view('customer.auth.register');
    }

    public function register(CreateRequest $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'position_id' => 3,
            'password' => Hash::make($request->password),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];

        if (User::insert($data)) {
            return redirect(RouteServiceProvider::CUSTOMERS);
        }

        return back();
    }
}
