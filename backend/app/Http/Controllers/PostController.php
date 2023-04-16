<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\admin\post\CreatedRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatedRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $url = Cloudinary::upload($image->getRealPath(), [
                'folder' => 'PRO1014_WE18103_Nhom_6/Products',
            ]);

            $data = [
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'product_code' => $request->product,
                'introduction' => $request->introduction,
                'slug' => $request->slug,
                'content' => $request->content,
                'image_url' => $url->getSecurePath(),
                'image_public_id' => $url->getPublicId(),
                'view' => 0,
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ];

            try {

                Post::create($data);
                return back()->with('msg', 'Thêm bài viết mới thành công');
            } catch (\Throwable $th) {

                return back()->with('msg', 'Thêm bài viết mới thất bại');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Post $post)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $url = Cloudinary::upload($image->getRealPath(), [
                'folder' => 'PRO1014_WE18103_Nhom_6/Products',
            ]);

            $post->user_id = Auth::user()->id;
            $post->title = $request->title;
            $post->product_code = $request->product;
            $post->introduction = $request->introduction;
            $post->slug = $request->slug;
            $post->content = $request->content;
            $post->image_url = $url->getSecurePath();
            $post->image_public_id = $url->getPublicId();
            $post->view = 0;
            $post->created_at = date('Y-m-d h:i:s');
            $post->updated_at = date('Y-m-d h:i:s');
        }
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->product_code = $request->product;
        $post->introduction = $request->introduction;
        $post->slug = $request->slug;
        $post->content = $request->content;
        $post->view = 0;
        $post->created_at = date('Y-m-d h:i:s');
        $post->updated_at = date('Y-m-d h:i:s');

        if ($post->save()) {
            return back()->with(['msg' => 'Cập nhật thành công']);
        } else {
            return back()->with(['msg' => 'Cập nhật Thất bại']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Post::destroy($id)) {
            return back()->with('msg', "successfully");
        }

        return back()->with('msg', "error");
    }
}
