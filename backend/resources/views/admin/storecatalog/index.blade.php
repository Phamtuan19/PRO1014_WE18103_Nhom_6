@extends('admin.layout.index')

@section('contents')
    <div class="content-wrapper">
        <div class="page-header">

            @if (session('msg'))
                <div class="alert alert-success text-center">
                    {{ session('msg') }}
                </div>
            @endif


            <h3 class="page-title"> Danh sách danh mục </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="?isDelete=delete" style="color: #0d6efd; font-weight: 600">Thêm danh mục </a>
                    </li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th>
                                        <a href="?orderBy=name&orderType={{ request()->orderType == 'ASC' ? 'DESC' : 'ASC' }}"
                                            class="{!! request()->orderBy == 'name' ? 'active_custom' : '' !!}">
                                            Name
                                            <i class="fa-solid fa-right-left menu-icon__custom"></i>
                                        </a>
                                    </th>
                                    {{-- <th>
                                        <a href="#" class="{!! request()->orderBy == 'name' ? 'active_custom' : '' !!}">
                                            Danh mục con
                                            <i class="fa-solid fa-right-left menu-icon__custom"></i>
                                        </a>
                                    </th> --}}
                                    <th>
                                        <a href="?orderBy=slug&orderType={{ request()->orderType == 'ASC' ? 'DESC' : 'ASC' }}"
                                            class="{!! request()->orderBy == 'email' ? 'active_custom' : '' !!}">
                                            Slug
                                            <i class="fa-solid fa-right-left menu-icon__custom"></i>
                                        </a>
                                    </th>
                                    <th>Danh mục con</th>
                                    <th>
                                        <a href="?orderBy=created_at&orderType={{ request()->orderType == 'ASC' ? 'DESC' : 'ASC' }}"
                                            class="{!! request()->orderBy == 'created_at' ? 'active_custom' : '' !!}">
                                            Created_at
                                            <i class="fa-solid fa-right-left menu-icon__custom"></i>
                                        </a>
                                    </th>
                                    <th width="5%">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($storecatalog as $index => $category)
                                    {{-- @dd($category) --}}
                                    <tr style="color: #0d6efd; font-weight: 600; font-size: 24px">
                                        <td> {{ $index + 1 }} </td>

                                        {{-- <td> {{ str_repeat('---', $category['level']) }} </td> --}}
                                        <td> {{ $category['name'] }}
                                        </td>

                                        <td> {{ $category['slug'] }} </td>
                                        <td> {{ !empty($category['created_at']) ? substr($category['created_at'], 0, 10) : '' }}
                                        </td>
                                        <td></td>
                                        <td>
                                            <div class="d-flex justify-content-between">

                                                <a href="{{ route('admin.storecatalog.show', $category['id']) }}"
                                                    class="" style="color: black; padding: 6px">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>

                                                <form id="form-modal"
                                                    action="{{ route('admin.storecatalog.destroy', $category['id']) }}"
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

                                    @if (count($category['categories']) > 0)
                                        @foreach ($category['categories'] as $cur => $item)
                                            <tr>
                                                <td> --- </td>

                                                {{-- <td> {{ str_repeat('---', $category['level']) }} </td> --}}
                                                <td> {{ $item['name'] }}
                                                </td>

                                                <td> {{ $item['slug'] }} </td>
                                                <td> {{ !empty($item['created_at']) ? substr($item['created_at'], 0, 10) : '' }}
                                                </td>
                                                <td><i class="fa-solid fa-check" style="color: chartreuse"></i></td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    @if (count($category['author']) > 0)
                                        @foreach ($category['author'] as $cur => $item)
                                            <tr>
                                                <td> --- </td>

                                                {{-- <td> {{ str_repeat('---', $category['level']) }} </td> --}}
                                                <td> {{ $item['name'] }}
                                                </td>

                                                <td> {{ $item['slug'] }} </td>
                                                <td> {{ !empty($item['created_at']) ? substr($item['created_at'], 0, 10) : '' }}
                                                </td>
                                                <td><i class="fa-solid fa-check" style="color: chartreuse"></i></td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    @if (count($category['author']) > 0)
                                        @foreach ($category['author'] as $cur => $item)
                                            <tr>
                                                <td> --- </td>

                                                {{-- <td> {{ str_repeat('---', $category['level']) }} </td> --}}
                                                <td> {{ $item['name'] }}
                                                </td>

                                                <td> {{ $item['slug'] }} </td>
                                                <td> {{ !empty($item['created_at']) ? substr($item['created_at'], 0, 10) : '' }}
                                                </td>
                                                <td><i class="fa-solid fa-check" style="color: chartreuse"></i></td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach
                            </tbody>
                        </table>

                        {{-- <div class="mt-3" style="float: right;">
                            {{ $categories->appends(request()->all())->links() }}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
