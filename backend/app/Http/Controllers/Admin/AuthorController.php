<?php

namespace App\Http\Controllers\Admin;

use App\Models\Author;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Http\Requests\admin\Categories\CreateRequest;
use App\Http\Requests\admin\Categories\UpdateRequest;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = new Author;

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

        $authors = $query->queryAuthor($query, $orderBy, $orderType)->paginate(1);

        return view('admin.author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.create');
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

        if (Author::insert($data)) {
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
    public function show(Author $author)
    {
        return view('admin.author.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UpdateRequest $request, Author $author)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Author $author)
    {
        $author->name = $request->name;
        $author->slug = $request->slug;
        $author->timestamps = date('Y-m-d H:i:s');

        if ($author->save()) {
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
    public function destroy(Author $author)
    {
        if ($author->delete()) {
            return back()->with('msg', 'successfully');
        }

        return back()->with('msg', 'error');
    }
}
