<?php

namespace App\Http\Controllers\customer\auth;

use Exception;

use App\Models\User;

use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Mail\Order\Successfully;
use App\Mail\ResetPassword\Reset;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\admin\User\CreateRequest;
use App\Http\Requests\Customer\Auth\loginRequest;

class loginController extends Controller
{

    public function index()
    {
        return view('customer.auth.login');
    }

    public function login(Request $request)
    {

        // return response()->json($request->all(), 200);
        $user = User::select('id', 'name', 'email', 'phone', 'password', 'address')
            ->where('email', $request->email)
            ->where('position_id', 2)
            ->first();

            // return response()->json($user, 200);

        if ($user->count() == 0) {

            return response()->json(['msg' => "Tài khoản không tồn tại"], 402);
        } else if (!Hash::check($request->password, $user->password)) {

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
            return response()->json(["msg" => "Mật khẩu không chính xác!"], 402);
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

    public function updatePassword(Request $request, User $user)
    {
        if (!Hash::check($request->currentPassword, $user->password)) {
            return response()->json(["msg" => "Mật khẩu không chính xác!"], 402);
        } else {
            $user->password = Hash::make($request->newPassword);

            try {
                $user->save();
                return response()->json(["msg" => "Đổi mật khẩu thành công!"], 200);
            } catch (\Throwable $th) {
                return response()->json(["msg" => "Đổi mật khẩu thất bại!"], 402);
            }
        }
    }

    public function register(Request $request)
    {
        $checkUserEmail = User::where('email', $request->email)->get();
        $checkUserPhone = User::Where('phone', $request->phone)->get();

        if ($checkUserEmail->count() > 0) {

            return response()->json(['status' => 409, "msg" => "Email đẵ tồn tại"], 409);
        } else if ($checkUserPhone->count() > 0) {

            return response()->json(['status' => 410, "msg" => "Số điện thoại đẵ tồn tại"], 409);
        } else {
            $data = [
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'position_id' => 2,
            ];

            try {
                User::create($data);
                return response()->json(['status' => 200, "msg" => "Đăng ký thành công"], 200);
            } catch (\Throwable $th) {
                return response()->json(['status' => 402, "msg" => "Đăng ký thất bại!"], 402);
            }
        }
    }

    public function resetPassword(Request $request)
    {
        $checkUser = User::where('email', $request->email)
            ->where('position_id', 2)
            ->get();
        // return response()->json(["msg" => $checkUser], 200);

        if ($checkUser->count() > 0) {

            $token = (Str::random(100));
            try {

                DB::table('users')
                    ->where('email', $request->email)
                    ->update(['token_verify' => $token]);
                $data = $token;
                $email = 'phamtuan19hd@gmail.com';
                Mail::to($email)->send(new Reset($data));
                return response()->json(['status' => 200, "msg" => "Yêu cầu lấy lại mật khẩu thành công"], 200);
            } catch (\Throwable $th) {
                return response()->json(['status' => 402, "msg" => "Yêu cầu lấy lại mật khẩu thất bại!"], 402);
            }
        } else {

            return response()->json(['status' => 409, "msg" => "Email không tồn tại"], 409);
        }
    }

    public function comfirmPassword(Request $request)
    {

        $checkUser = User::where('token_verify', $request->token)->get();

        if ($checkUser->count() > 0) {

            try {

                DB::table('users')
                    ->where('token_verify', $request->token)
                    ->update([
                        'password' => Hash::make($request->password),
                        'token_verify' => null,
                    ]);

                return response()->json(["msg" => "Cập nhật thành công!"], 200);
            } catch (\Throwable $th) {

                return response()->json(["msg" => "Cập nhật thất bại!"], 402);
            }
        } else {
            return response()->json(["msg" => "Cập nhật thất bại!"], 402);
        }
    }
}
