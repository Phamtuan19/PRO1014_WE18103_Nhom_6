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
}
