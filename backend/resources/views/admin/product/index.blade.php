@extends('admin.layout.index')

@section('contents')
    <div class="content-wrapper">
        <div class="page-header">

            @if (session('msg'))
                <div class="alert alert-success text-center">
                    {{ session('msg') }}
                </div>
            @endif


            <h3 class="page-title"> Danh sách sản phẩm </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.products.create') }}" class="" style="color: #0d6efd; font-weight: 600">
                            Thêm sản phẩm mới
                        </a>
                        <span style="margin: 0 4px;">/</span>
                        <a href="?isDelete=delete" class="{{ isset(request()->isDelete) ? 'd-none' : false }}"
                            style="color: #0d6efd; font-weight: 600">Danh sách đã xóa </a>
                        <a href="?" class="{{ !isset(request()->isDelete) ? 'd-none' : false }}"
                            style="color: #0d6efd; font-weight: 600">Danh sách hoạt động</a>
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
                                    <th> # </th>
                                    <th>
                                        <a href="?orderBy=name&orderType={{ request()->orderType == 'ASC' ? 'DESC' : 'ASC' }}"
                                            class="{!! request()->orderBy == 'name' ? 'active_custom' : '' !!}">
                                            Tên sản phẩm
                                            <i class="fa-solid fa-right-left menu-icon__custom"></i>
                                        </a>
                                    </th>
                                    <th> Hình ảnh </th>
                                    <th>
                                        <a href="?orderBy=author_id&orderType={{ request()->orderType == 'ASC' ? 'DESC' : 'ASC' }}"
                                            class="{!! request()->orderBy == 'author_id' ? 'active_custom' : '' !!}">
                                            Tác giả
                                            <i class="fa-solid fa-right-left menu-icon__custom"></i>
                                        </a>
                                    </th>
                                    <th>
                                        <a href="?orderBy=category_id&orderType={{ request()->orderType == 'ASC' ? 'DESC' : 'ASC' }}"
                                            class="{!! request()->orderBy == 'category_id' ? 'active_custom' : '' !!}">
                                            Danh mục
                                            <i class="fa-solid fa-right-left menu-icon__custom"></i>
                                        </a>
                                    </th>
                                    <th>
                                        <a href="?orderBy=created_at&orderType={{ request()->orderType == 'ASC' ? 'DESC' : 'ASC' }}"
                                            class="{!! request()->orderBy == 'created_at' ? 'active_custom' : '' !!}">
                                            Nhà xuất bản
                                            <i class="fa-solid fa-right-left menu-icon__custom"></i>
                                        </a>
                                    </th>
                                    <th>Giá nhập</th>
                                    <th>Giá bán</th>
                                    <th>
                                        <a href="?orderBy=publishing_house_id&orderType={{ request()->orderType == 'ASC' ? 'DESC' : 'ASC' }}"
                                            class="{!! request()->orderBy == 'publishing_house_id' ? 'active_custom' : '' !!}">
                                            Thời gian tạo
                                            <i class="fa-solid fa-right-left menu-icon__custom"></i>
                                        </a>
                                    </th>
                                    <th width="5%">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $index => $product)
                                    <tr>
                                        <td> {{ $index }} </td>
                                        <td style="max-width: 136px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"> {{ $product->name }} </td>

                                        <td>
                                            <img src="{{ !empty($product->image[0]->image_url)? $product->image[0]->image_url: 'data:image/jpeg;base64,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' }}"
                                                alt="">
                                        </td>
                                        <td> {{ $product->author->name }} </td>
                                        <td  style="max-width: 136px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"> {{ !empty($product->categories->name) ? $product->categories->name : '' }} </td>
                                        <td> {{ $product->publishing_house->name }} </td>
                                        <td> {{ $product->detail->import_price }} </td>
                                        <td> {!! $product->detail->promotion_price != null
                                            ? '<span style="color: red; font-size: 16px;">' .
                                                $product->detail->promotion_price .
                                                '</span> <del>' .
                                                $product->detail->price .
                                                '</del>'
                                            : false !!} </td>
                                        <td> {{ date_format($product->created_at, 'd-m-Y') }} </td>
                                        <td>
                                            <div class="d-flex justify-content-between">

                                                @if (isset(request()->isDelete))
                                                    <form id="form-modal"
                                                        action="{{ route('admin.products.replay', $product->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')

                                                        <button type="submit"
                                                            style="border: none; background-color: #FFF; vertical-align: -webkit-baseline-middle;">
                                                            <i class="mdi mdi-replay"
                                                                style="font-size: 1rem; font-weight: 600"></i>
                                                        </button>
                                                    </form>

                                                    <form id="form-modal"
                                                        action="{{ route('admin.products.destroy', $product->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit"
                                                            style="border: none; background-color: #FFF; vertical-align: -webkit-baseline-middle;">
                                                            <i class="fa-solid fa-trash"
                                                                style="font-size: 1rem; font-weight: 600"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <a href="{{ route('admin.products.show', $product->id) }}"
                                                        class="" style="color: black; padding: 6px">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </a>
                                                    {{-- @if (Auth::id() != $product->id) --}}
                                                        <a href="{{ route('admin.products.edit', $product->id) }}"
                                                            class="" style="color: black; padding: 6px">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </a>
                                                    {{-- @endif --}}
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-3" style="float: right;">
                            {{ $products->appends(request()->all())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
