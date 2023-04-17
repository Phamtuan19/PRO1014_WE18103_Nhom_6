<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DiscountCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscountCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discountCode = DiscountCode::orderBy('remaining_quantity', 'ASC')->get();

        return view('admin.discountCode.index', compact('discountCode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discountCode.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'discount_code' => $request->discount_code,
            'percentage_decrease' => $request->percentage_decrease,
            'content' => $request->content,
            'quantity' => $request->quantity,
            'remaining_quantity' => $request->quantity,
            'time_application' => $request->time_application,
            'expired' => $request->expired,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        if(DiscountCode::insert($data)){
            return back()->with('msg', 'Thêm mã giảm giá thành công');
        }else {
            return back()->with('msg', 'Thêm mã giảm giá Thất bại');
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

        $discountCode = DiscountCode::find($id);

        return view('admin.discountCode.show', compact('discountCode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $discountCode = DiscountCode::find($id);

        $data = [
            'discount_code' => $request->discount_code,
            'percentage_decrease' => $request->percentage_decrease,
            'content' => $request->content,
            'quantity' => $request->quantity,
            'time_application' => $request->time_application,
            'expired' => $request->expired,
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        if($discountCode->update($data)) {
            return back()->with('msg', 'Cập nhật thành công');
        }else {
            return back()->with('msg', 'Cập nhật thất bại');
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
