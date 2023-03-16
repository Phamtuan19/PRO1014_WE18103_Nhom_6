<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PublishingHouse;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Categories\CreateRequest;
use App\Http\Requests\admin\Categories\UpdateRequest;

class PublishingHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // add
        $query = new PublishingHouse;

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

        $allPublishingHouse = $query->queryPublishingHouse($query, $orderBy, $orderType)->paginate(1);

        return view('admin.publishing_house.index', compact('allPublishingHouse'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.publishing_house.create');
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
            'slug' => $request->slug,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if (PublishingHouse::insert($data)) {
            return back()->with('msg', 'successfully');
        }

        return back()->with('msg', 'error');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PublishingHouse $publishingHouse)
    {
        return view('admin.publishing_house.show', compact('publishingHouse'));
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
    public function update(UpdateRequest $request, PublishingHouse $publishingHouse)
    {
        $publishingHouse->name = $request->name;
        $publishingHouse->slug = $request->slug;
        $publishingHouse->timestamps = date('Y-m-d H:i:s');

        if ($publishingHouse->save()) {
            return back()->with('msg', 'successfully');
        }

        return back()->with('msg', 'error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PublishingHouse $publishingHouse)
    {
        if ($publishingHouse->delete()) {
            return back()->with('msg', 'successfully');
        }

        return back()->with('msg', 'error');
    }
}
