<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // validation Login
    protected function validateLogin(Request $request)
    {
        $request->validate(
            [
                $this->username() => 'required|string|email',
                'password' => 'required|string|min:8',
            ],
            [
                'required' => ':attribute không được để trống',
                'string' => ':attribute không đúng định dạng',
                'min' => ':attribute phải lớn hơn :min ký tự',
                'email' => ':attribute không hợp lệ',
            ],
            [
                $this->username() => 'Email đăng nhập',
                'password' => 'Mật khẩu',
            ]
        );
    }

    public function username()
    {
        return 'email';
    }

    // login failed
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => 'Xin vui lòng kiểm tra thông tin tài khoản',
        ]);
    }
}
