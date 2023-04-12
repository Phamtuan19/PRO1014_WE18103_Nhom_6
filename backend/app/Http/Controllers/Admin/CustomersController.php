<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

use App\Models\Position;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use App\Http\Requests\admin\User\CreateRequest;
use App\Http\Requests\admin\User\UpdateRequest;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = new User;

        $orderType = 'DESC';
        $orderBy = 'created_at';
        $isDelete = null;

        if (!empty($request->isDelete)) {
            $isDelete = $request->isDelete;
        }

        if (!empty($request->orderType)) {
            $orderType = $request->orderType;
        }

        if (!empty($request->orderBy)) {
            $orderBy = $request->orderBy;
        }

        $users = $query->queryCustomer($query, $orderBy, $orderType, $isDelete)->paginate(1);

        return view('admin.customer.index', compact('users', 'orderType', 'orderBy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Position::where('id', 3)->get();

        return view('admin.customer.create', compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'position_id' => $request->position_id,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        if (User::insert($data)) {
            return back()->with('msg', 'successfully');
        } else {
            return back()->with('msg', 'error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        $positions = Position::where('id', 3)->get();

        return view('admin.customer.show', compact('user', 'positions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        $user->is_deleted = date("Y-m-d H:i:s");

        $user->save();

        return back()->with('msg', "successfully");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateRequest $request)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->position_id = $request->position_id;
        $user->address = $request->address;
        $user->image_url = $request->image_url;
        $user->password = Hash::make($request->password);
        $user->updated_at = date("Y-m-d H:i:s");

        if ($user->update()) {
            return back()->with('msg', "successfully");
        }

        return back()->with('msg', "error");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::destroy($id)) {
            return back()->with('msg', "successfully");
        }

        return back()->with('msg', "error");
    }

    public function replay($id)
    {
        $user = User::find($id);

        $user->is_deleted = null;

        $user->update();

        return back()->with('msg', 'successfully');
    }
}
