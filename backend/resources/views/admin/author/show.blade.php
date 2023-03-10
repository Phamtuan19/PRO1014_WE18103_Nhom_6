@extends('admin.layout.index')

@section('contents')
    <div class="content-wrapper">
        <div class="page-header">

            @if (session('msg'))
                <div class="alert alert-success text-center">
                    {{ session('msg') }}
                </div>
            @endif
        </div>
        <div class="page-header">
            <h3 class="page-title"> Thêm mới danh mục </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.author.index') }}" style="color: #0d6efd; font-weight: 600">Danh sách
                            danh mục</a>
                    </li>
                </ol>
            </nav>
        </div>

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.author.update', $author->id) }}" method="POST">
                        @method('PATCH')
                        @csrf

                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input type="text" class="form-control form-control-lg" id="name"
                                placeholder="Name category ..." name="name" value="{{ $author->name }}">

                            @error('name')
                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Slug Danh mục</label>
                            <input type="text" class="form-control" id="slug" placeholder="slug ..." name="slug"
                                value="{{ $author->slug }}">

                            @error('slug')
                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-gradient-primary me-2">Thêm mới</button>
                    </form>
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
