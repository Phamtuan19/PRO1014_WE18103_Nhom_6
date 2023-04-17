@extends('admin.layout.index')

@section('contents')
    <div class="content-wrapper">
        <div class="page-header">

            @if (session('msg'))
                <div class="alert alert-success text-center">
                    {{ session('msg') }}
                </div>
            @endif


            <h3 class="page-title"> Danh bài viết </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.posts.create') }}" class="" style="color: #0d6efd; font-weight: 600">
                            Thêm sản phẩm mới
                        </a>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body" style="padding: 2.5rem 0.5rem">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center"> # </th>
                                    <th style="text-align: center">
                                        Người viết
                                    </th>
                                    <th style="text-align: center"> Hình ảnh </th>
                                    <th style="text-align: center">
                                        Tên bài viết
                                    </th>
                                    <th style="text-align: center">
                                        Thời gian tạo
                                    </th>
                                    <th width="5%" style="text-align: center">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $index => $post)
                                    <tr>
                                        <td style="text-align: center"> {{ $index + 1 }} </td>
                                        <td style="text-align: center"> {{ $post->user->name }} </td>
                                        <td style="text-align: center">
                                            <img src="{{ $post->image_url }}" alt=""
                                                style="width: 50px; height: 70px; border-radius: 0px">
                                        </td>
                                        <td
                                            style="max-width: 350px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis; text-align: center">
                                            {{ $post->title }} </td>
                                        <td style="text-align: center"> {{ $post->created_at }} </td>
                                        <td style="text-align: center">
                                            <div class="d-flex justify-content-between">
                                                <a href="{{ route('admin.posts.show', $post->id) }}" class=""
                                                    style="color: black; padding: 6px">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                                <form id="form-modal" action="{{ route('admin.posts.destroy', $post->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                        style="border: none; background-color: #FFF; vertical-align: -webkit-baseline-middle;">
                                                        <i class="fa-solid fa-trash"
                                                            style="font-size: 1rem; font-weight: 600"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-3" style="float: right;">
                            {{-- {{ $posts->appends(request()->all())->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
