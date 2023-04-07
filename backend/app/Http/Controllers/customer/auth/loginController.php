<?php

namespace App\Http\Controllers\customer\auth;

use Exception;

use App\Models\User;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\Type\TrueType;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Customer\Auth\loginRequest;

class loginController extends Controller
{

    public function index()
    {
        return view('customer.auth.login');
    }

    public function login(loginRequest $request)
    {
        $user = User::select('id', 'name', 'email', 'phone', 'password', 'address')
            ->where('email', $request->email)
            ->where('position_id', 2)->first();

        if ($user->count() === 0) {
            return response()->json(['msg' => "Tài khoản không tồn tại"], 402);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json(["msg" => "Email hoặc mật khẩu không chính xác!"], 402);
        } else {
            $token = $user->createToken("authLogin")->accessToken;
            return response()->json(["user" => $user, "token" => $token, "msg" => "Login success!"], 200);
        }
    }

    public function logout(Request $request)
    {
        try {
            if ($request->user()->token()->revoke())
                return response()->json(["msg" => "Đăng xuất thành công!"], 200);
        } catch (Exception $e) {
            return response()->json(["msg" => "Đăng xuất thành công!"], 200);
        }
    }

    public function update(Request $request, User $user)
    {
        if (!Hash::check($request->password, $user->password)) {
            return response()->json(["msg" => "Email hoặc mật khẩu không chính xác!"], 402);
        } else {

            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;

            try {
                $user->save();
                return response()->json(["msg" => "Cập nhật thành công!", 'user' => $user], 200);
            } catch (\Throwable $th) {
                return response()->json(["msg" => "Cập nhật thông tin thất bại!"], 402);
            }
        }
    }
}
