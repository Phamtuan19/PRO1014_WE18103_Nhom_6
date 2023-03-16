@extends('admin.layout.index')

@section('contents')
    <div class="content-wrapper">
        {{-- <div class="page-header">
            <h3 class="page-title"> Danh sách quản trị viên </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
            </nav>
        </div> --}}
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thêm người quản trị</h4>

                        @if (session('msg'))
                            <div class="alert alert-success text-center">
                                {{ session('msg') }}
                            </div>
                        @endif

                        {{-- <p class="card-description"> Basic form elements </p> --}}
                        <form class="forms-sample" action="{{ route('admin.users.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Name"
                                    name="name" value="{{ old('name') }}">

                                @error('name')
                                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail3">Email address</label>
                                <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Email"
                                    name="email" value="{{ old('name') }}">

                                @error('email')
                                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail3">Phone</label>
                                <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Phone"
                                    name="phone" value="{{ old('Phone') }}">

                                @error('phone')
                                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="Position">Position</label>
                                <select class="form-control" id="Position" name="position_id">
                                    <option value="">-- Chọn --</option>
                                    @foreach ($positions as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>

                                @error('position_id')
                                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">address (không bắt buộc)</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ old('address') }}" placeholder="address">

                                @error('address')
                                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Image upload (không bắt buộc)</label>
                                <input type="file" name="image" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled
                                        placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary"
                                            type="button">Upload</button>
                                    </span>
                                </div>

                                @error('image')
                                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword4">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword4" name="password"
                                    placeholder="Password">

                                @error('password')
                                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Cassword Confirmation</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="password_confirmation">

                                @error('password_confirmation')
                                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- <div class="form-group">
                        <label for="exampleInputCity1">City</label>
                        <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
                    </div> --}}

                            <button type="submit" class="btn btn-gradient-primary me-2">Thêm mới</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
