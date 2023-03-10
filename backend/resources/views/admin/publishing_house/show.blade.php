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
            <h3 class="page-title"> Cập nhật nhà xuất bản </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.publishing-house.index') }}" style="color: #0d6efd; font-weight: 600">Danh sách
                            nhà xuất bản</a>
                    </li>
                </ol>
            </nav>
        </div>

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.publishing-house.update', $publishingHouse->id) }}" method="POST">
                        @method('PATCH')
                        @csrf

                        <div class="form-group">
                            <label>Tên nhà xuất bản</label>
                            <input type="text" class="form-control form-control-lg" id="name"
                                placeholder="Name publishing house ..." name="name" value="{{ $publishingHouse->name }}">

                            @error('name')
                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" class="form-control" id="slug" placeholder="slug ..." name="slug"
                                value="{{ $publishingHouse->slug }}">

                            @error('slug')
                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                            @enderror
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
