@extends('admin.layout.index')

@section('contents')
    <div class="content-wrapper">
        <div class="page-header">


        </div>
        <div class="page-header">
            <h3 class="page-title"> Thêm mới sản phẩm </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="" style="color: #0d6efd; font-weight: 600">Danh sách
                            sản phẩm</a>
                    </li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        @if (session('msg'))
                            <div class="alert alert-success text-center">
                                {{ session('msg') }}
                            </div>
                        @endif

                        <form class="form-sample" action="{{ route('admin.storecatalog.store') }}" method="POST" >
                            @csrf

                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input type="text" class="form-control form-control-lg" id="name"
                                    placeholder="Name category ..." name="name">

                                @error('name')
                                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Slug Danh mục</label>
                                <input type="text" class="form-control" id="slug" placeholder="slug ..."
                                    name="slug">

                                @error('slug')
                                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Path Danh mục</label>
                                <input type="text" class="form-control" id="path" placeholder="path ..."
                                    name="path">

                                @error('path')
                                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-gradient-primary me-2">Thêm mới</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#name").keyup(function() {
                $("#slug").val(renSlug($(this).val()))
            });

            $("#slug").val(renSlug($("#title").val()))
        });
    </script>
@endsection
