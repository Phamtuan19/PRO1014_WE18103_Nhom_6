<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Categories\CreateRequest;
use App\Http\Requests\admin\Categories\UpdateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = new Categories;

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

        $categories = $query->queryCategory($query, $orderBy, $orderType)->get()->toArray();
        // dd($categories);
        // dd(data_tree($categories, 0));
        // dd($categories->toArray());

        $categories = data_tree($categories, 0);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();

        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {

        // dd($request->all());
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'parent_id' => $request->parent,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if (Categories::insert($data)) {
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
    public function show(Categories $category)
    {
        $categories = Categories::all();

        return view('admin.categories.show', compact('category', 'categories'));
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
    public function update(UpdateRequest $request, Categories $category)
    {
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->parent_id = $request->parent;
        $category->timestamps = date('Y-m-d H:i:s');

        if ($category->save()) {
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
    public function destroy(Categories $category)
    {
        if ($category->delete()) {
            return back()->with('msg', 'successfully');
        }

        return back()->with('msg', 'error');
    }
}
