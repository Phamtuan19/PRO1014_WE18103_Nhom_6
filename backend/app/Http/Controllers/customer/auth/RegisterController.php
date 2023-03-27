<?php

namespace App\Http\Controllers\customer\auth;

use Exception;

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
        // dd($request->all());
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'position_id' => 3,
            'password' => Hash::make($request->password),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];

        try {
            if (User::create($data)) {
                return back()->with('msg', 'đăng ký thành công');
            }
        }catch (Exception $e) {
            return back()->with('msg', $e->getMessage());
        }
    }
}
