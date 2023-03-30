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
                        <a href="{{ route('admin.storecatalog.index') }}" style="color: #0d6efd; font-weight: 600">Danh sách
                            danh mục</a>
                    </li>
                </ol>
            </nav>
        </div>

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.storecatalog.update', $storecatalog->id) }}" method="POST">
                        @method('PATCH')
                        @csrf

                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input type="text" class="form-control form-control-lg" id="name"
                                placeholder="Name storecatalog ..." name="name" value="{{ $storecatalog->name }}">

                            @error('name')
                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Slug Danh mục</label>
                            <input type="text" class="form-control" id="slug" placeholder="slug ..." name="slug"
                                value="{{ $storecatalog->slug }}">

                            @error('slug')
                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Path Danh mục</label>
                            <input type="text" class="form-control" id="path" placeholder="path ..." name="path"
                                value="{{ $storecatalog->path }}">

                            @error('path')
                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="container-fuild">
                            <h6>Danh mục con</h6>
                            <br />
                            <div class="row">
                                <div class="col-3 form-group">
                                    <h6>Loại sách</h6>
                                    @error('books')
                                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                    @enderror
                                    @foreach ($categories as $value)
                                        <div class="form-check form-check-flat form-check-primary">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="books[]"
                                                    value="{{ $value->id }}" {{ ($value->storecatalog_id == $storecatalog->id) ? 'checked': false }}>
                                                {{ $value->name }}
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="col-3 form-group">
                                    <h6>Tác giả</h6>
                                    @error('author')
                                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                    @enderror
                                    @foreach ($author as $value)
                                        <div class="form-check form-check-flat form-check-primary">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="author[]"
                                                    value="{{ $value->id }}" {{ ($value->storecatalog_id == $storecatalog->id) ? 'checked': false }}>
                                                {{ $value->name }}
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="col-3 form-group">
                                    <h6>Nhà xuất bản</h6>
                                    @error('publishing_house')
                                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                    @enderror
                                    @foreach ($publishing_house as $value)
                                        <div class="form-check form-check-flat form-check-primary">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="publishing_house[]"
                                                    value="{{ $value->id }}" {{ ($value->storecatalog_id == $storecatalog->id) ? 'checked': false }}>
                                                {{ $value->name }}
                                                <i class="input-helper"></i>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-gradient-primary me-2">Cập nhật</button>
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
