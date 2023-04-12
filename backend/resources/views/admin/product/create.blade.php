@extends('admin.layout.index')

@section('contents')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Thêm mới sản phẩm </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.products.index') }}" style="color: #0d6efd; font-weight: 600">Danh sách
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

                        <form class="form-sample" action="{{ route('admin.products.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label mb-0 pt-0">Tên sản phẩm</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                        @error('name')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleTextarea1">Tiêu đề sản phẩm</label>
                                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="title"></textarea>
                                        @error('title')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleTextarea1">Tóm tắt nội dung</label>
                                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="introduction"></textarea>
                                        @error('introduction')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label mb-0 pt-0">Danh mục sản phẩm</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="category">
                                                <option value="">-- chọn --</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('category')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label mb-0 pt-0">Tác giả</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="author">
                                                <option value="">-- chọn --</option>
                                                @foreach ($authors as $author)
                                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('author')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label mb-0 pt-0">Nhà xuất bản</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="publishing_house">
                                                <option value="">-- chọn --</option>
                                                @foreach ($allPublishingHouse as $publishingHouse)
                                                    <option value="{{ $publishingHouse->id }}">
                                                        {{ $publishingHouse->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('publishing_house')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- <div class="col-md-6"> --}}
                                    <div class="form-group">
                                        <label class="col-form-label">Ngày xuất bản</label>
                                        <div class="col-sm-12">
                                            <input class="form-control" placeholder="dd/mm/yyyy" name="publication_date">
                                        </div>
                                        @error('publication_date')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- </div> --}}
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Kích thước</label>
                                        <div class="col-sm-12">
                                            <input class="form-control" placeholder="size ..." name="size">
                                        </div>
                                        @error('size')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Số trang</label>
                                        <div class="col-sm-12">
                                            <input class="form-control" placeholder="page number ..." name="page_number">
                                        </div>
                                        @error('page_number')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label ">trọng lượng</label>
                                        <div class="col-sm-12">
                                            <input class="form-control" placeholder="Trọng lượng ..." name="weight">
                                        </div>
                                        @error('weight')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Giá nhập</label>
                                        <div class="col-sm-12">
                                            <input class="form-control" placeholder="Giá nhập ..." name="import_price">
                                        </div>
                                        @error('import_price')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Giá bán</label>
                                        <div class="col-sm-12">
                                            <input class="form-control" placeholder="Giá bán ..." name="price">
                                        </div>
                                        @error('price')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Giá bán khuyến mại</label>
                                        <div class="col-sm-12">
                                            <input class="form-control" placeholder="Giá bán khuyến mại ..."
                                                name="promotion_price">
                                        </div>
                                        @error('promotion_price')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Số lượng nhập</label>
                                        <div class="col-sm-12">
                                            <input class="form-control" placeholder="Số lượng nhập sản phẩm ..."
                                                name="quantity">
                                        </div>
                                        @error('quantity')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="images">Ảnh sản phẩm</label>
                                    <div class="my-2 box-reset_images d-flex">
                                        <input type="file" class="form-control" id="images" name="images[]"
                                            onchange="preview_images();" multiple />
                                        <input onclick="return resetForm();" type="reset"
                                            class="btn btn-danger reset_images" name='reset_images' value="Reset" />
                                    </div>
                                    @error('images')
                                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                    @enderror
                                    <div class="row mt-2" id="image_preview"></div>
                                </div>
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
        // Render Images
        function preview_images() {
            resetForm()
            var total_file = document.getElementById("images").files.length;
            for (var i = 0; i < total_file; i++) {
                $('#image_preview').append(`
                  <div class='col-md-2'>
                      <img class='img-responsive' src='${URL.createObjectURL(event.target.files[i])}'>
                  </div>`);
            }
        }

        function resetForm() {
            $("#image_preview").html("");
            return true;
        }
    </script>
@endsection
