<?php

namespace App\Http\Controllers\Admin;

use App\Models\Author;
use App\Models\Categories;
use App\Models\StoreCatalog;
use Illuminate\Http\Request;
use App\Models\PublishingHouse;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\StoreCatalog\CreateRequest;

class StoreCatalogController extends Controller
{
    public function index()
    {
        // $storecatalog = data_tree(StoreCatalog::all()->toArray(), 0);

        $storecatalog = StoreCatalog::with('categories', 'author', 'publishingHouse')->get()->toArray();

        // $storecatalog = data_tree($storecatalog, 0);

        // dd($storecatalog);

        return view('admin.storecatalog.index', compact('storecatalog'));
    }

    public function create()
    {
        return view('admin.storecatalog.create');
    }

    public function store(CreateRequest $request)
    {
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'path' => $request->path,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if (StoreCatalog::insert($data)) {
            return back()->with('msg', 'success');
        }

        return back()->with('msg', 'error');
    }

    public function show(StoreCatalog $storecatalog)
    {
        $categories = Categories::all();
        $author = Author::all();
        $publishing_house = PublishingHouse::all();

        return view('admin.storecatalog.show', compact('storecatalog', 'categories', 'author', 'publishing_house'));
    }

    public function update(StoreCatalog $storecatalog, Request $request)
    {

        $storecatalog->name = $request->name;
        $storecatalog->slug = $request->slug;
        $storecatalog->path = $request->path;
        $storecatalog->created_at = date('Y-m-d H:i:s');
        $storecatalog->updated_at = date('Y-m-d H:i:s');

        $storecatalog->save();

        if (!empty($request->books)) {

            $this->setFalseParent($storecatalog, 'categories', $request->books);

            foreach ($request->books as $item) {
                $category = Categories::find($item);
                $category->storecatalog_id = $storecatalog->id;
                $category->created_at = date('Y-m-d H:i:s');
                $category->updated_at = date('Y-m-d H:i:s');
                $category->save();
            }
        } else {
            $this->setFalseParent($storecatalog, 'categories');
        }

        if (!empty($request->author)) {

            $this->setFalseParent($storecatalog, 'author', $request->books);

            foreach ($request->author as $item) {
                $author = Author::find($item);

                $author->storecatalog_id = $storecatalog->id;
                $author->created_at = date('Y-m-d H:i:s');
                $author->updated_at = date('Y-m-d H:i:s');

                $author->save();
            }
        } else {
            $this->setFalseParent($storecatalog, 'author');
        }

        if (!empty($request->publishing_house)) {

            $this->setFalseParent($storecatalog, 'publishingHouse', $request->publishing_house);

            foreach ($request->publishing_house as $item) {
                $publishing_house = PublishingHouse::find($item);

                $publishing_house->storecatalog_id = $storecatalog->id;
                $publishing_house->created_at = date('Y-m-d H:i:s');
                $publishing_house->updated_at = date('Y-m-d H:i:s');

                $publishing_house->save();
            }
        } else {
            $this->setFalseParent($storecatalog, 'publishingHouse');
        }

        return back()->with('msg', 'success');
    }

    public function setFalseParent($storecatalog, $tableParent = '', $requestArr = null)
    {

        foreach ($storecatalog->$tableParent as $item) {
            if (!empty($requestArr)) {
                if (!in_array($item->storecatalog_id, $requestArr)) {
                    $item->storecatalog_id = null;
                }
            } else {
                $item->storecatalog_id = null;
            }

            $item->save();
        }
    }

    public function setTrueParent($requestArr, $storecatalog)
    {
        foreach ($requestArr as $item) {
            $tableItem = Author::find($item);
            $tableItem->storecatalog_id = $storecatalog->id;
            $tableItem->created_at = date('Y-m-d H:i:s');
            $tableItem->updated_at = date('Y-m-d H:i:s');
            $tableItem->save();
        }
    }

    public function destroy($id)
    {
    }
}
