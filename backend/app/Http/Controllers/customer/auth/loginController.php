<?php

namespace App\Http\Controllers\customer\auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use App\Providers\RouteServiceProvider;

use App\Models\User;

class loginController extends Controller
{

    public function index()
    {
        return view('customer.auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        $dataLogin = $request->except(['_token']); // lấy tất cả dữ liệu và loại bỏ _token

        if (isActiveCustomer($dataLogin['email']) === 'member') { // check position của người dùng
            $checkLogin = Auth::guard('customers')->attempt($dataLogin);

            if ($checkLogin) { // sử dụng lớp Auth (Của lớp Authentication) kiểm tra email và password dúng hay ko => true or false
                return redirect(route('customer.home')); // chuyển hướng đến name('customer.home)
            }

            return back()->with('msg', 'Email hoặc Mật khẩu không hợp lệ'); // trường hợp Auth::check() => false
        } else {
            return back()->with('msg', 'Tài khoản chưa đc kích hoạt hoặc bị khóa.');
        }
    }

    protected function validateLogin(Request $request)
    {
        // validate($rules, $messages, $attributes)
        $request->validate( // hàm validation
            [ // tương ứng với $rules
                'email' => 'required|string|email',
                'password' => 'required|string|min:8',
            ],
            [ // tương ứng với $messages
                'required' => ':attribute không được để trống', // :attribute -> $attribute
                'string' => ':attribute không đúng định dạng',
                'min' => ':attribute phải lớn hơn :min ký tự',
                'email' => ':attribute không đúng định dạng',
            ],
            [ // tương ứng với $attributes
                'email' => 'Email',
                'password' => 'Mật khẩu',
            ]
        );
    }
}
