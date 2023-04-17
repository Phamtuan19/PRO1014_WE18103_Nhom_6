@extends('admin.layout.index')

@section('links')
    <style>
        #picture__input {
            display: none;
        }

        .picture {
            width: 100%;
            aspect-ratio: 16/9;
            background: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #aaa;
            border: 2px dashed currentcolor;
            cursor: pointer;
            font-family: sans-serif;
            transition: color 300ms ease-in-out, background 300ms ease-in-out;
            outline: none;
            overflow: hidden;
        }

        .picture:hover {
            color: #777;
            background: #ccc;
        }

        .picture:active {
            border-color: turquoise;
            color: turquoise;
            background: #eee;
        }

        .picture:focus {
            color: #777;
            background: #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .picture__img {
            width: 150px !important;
            height: 200px !important;
            /* display: block; */
        }
    </style>
@endsection

@section('contents')
    <div class="content-wrapper">
        <div class="page-header">


        </div>
        <div class="page-header">
            <h3 class="page-title"> Thêm mới sản phẩm </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.categories.index') }}" style="color: #0d6efd; font-weight: 600">Danh sách
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

                        <form class="form-sample" action="{{ route('admin.products.update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label mb-0 pt-0">Tên sản phẩm</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="name" value="{{ $product->name }}"
                                                class="form-control">
                                        </div>
                                        @error('name')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleTextarea1">Tiêu đề sản phẩm</label>
                                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="title">{{ $product->title }}</textarea>
                                        @error('title')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleTextarea1">Tóm tắt nội dung</label>
                                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="introduction">{{ $product->introduction }}</textarea>
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
                                                    <option value="{{ $category->id }}"
                                                        {{ $product->category_id == $category->id ? 'selected' : false }}>
                                                        {{ $category->name }}</option>
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
                                                    <option value="{{ $author->id }}"
                                                        {{ $product->author_id == $author->id ? 'selected' : false }}>
                                                        {{ $author->name }}</option>
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
                                                    <option value="{{ $publishingHouse->id }}"
                                                        {{ $product->publishing_house_id == $publishingHouse->id ? 'selected' : false }}>
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
                                            <input class="form-control" placeholder="dd/mm/yyyy" name="publication_date"
                                                value="{{ $product->publication_date }}">
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
                                            <input class="form-control" placeholder="size ..." name="size"
                                                value="{{ $product->detail->size }}">
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
                                            <input class="form-control" placeholder="page number ..." name="page_number"
                                                value="{{ $product->detail->page_number }}">
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
                                            <input class="form-control" placeholder="Trọng lượng ..." name="weight"
                                                value="{{ $product->detail->weight }}">
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
                                            <input class="form-control" placeholder="Giá nhập ..." name="import_price"
                                                value="{{ $product->detail->import_price }}">
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
                                            <input class="form-control" placeholder="Giá bán ..." name="price"
                                                value="{{ $product->detail->price }}">
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
                                                name="promotion_price" value="{{ $product->detail->promotion_price }}">
                                        </div>
                                        @error('promotion_price')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6 form-group ">
                                    <label for="images">Ảnh sản phẩm</label>
                                    <div class="my-2 box-reset_images d-flex">
                                        <input type="file" class="form-control" id="images" name="images[]"
                                            onchange="preview_images();" multiple />
                                        <input onclick="return resetForm();" type="reset"
                                            class="btn btn-danger reset_images" name='reset_images' value="Reset" />
                                    </div>

                                    <div>
                                        @foreach ($image_products as $image)
                                            <img src="{{ $image->image_url }}" alt="" style="width: 150px;">
                                        @endforeach
                                    </div>

                                    @error('images')
                                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                    @enderror
                                    <div class="row mt-2" id="image_preview"></div>
                                </div>

                                <div class="col-6 form-group d-flex flex-column" style="position: relative;">
                                    <label for="">Thêm hình ảnh đại điện</label>
                                    <label class="picture" for="picture__input" tabIndex="0">
                                        <span class="picture__image"></span>
                                    </label>

                                    <input type="file" name="image_avatar" id="picture__input">

                                    <div class="image_reder">
                                        <img class="picture__img" src="{{ $product->image_url }}" alt=""
                                            style="width: 150px; position: absolute; top: 80px;">
                                    </div>
                                    @error('image_avatar')
                                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                    @enderror
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

    <script>
        const inputFile = document.querySelector("#picture__input");
        const image_reder = document.querySelector(".image_reder");
        const picture__img = document.querySelector(".picture__img");
        const pictureImage = document.querySelector(".picture__image");
        const pictureImageTxt = "Choose an image";
        pictureImage.innerHTML = pictureImageTxt;

        inputFile.addEventListener("change", function(e) {
            const inputTarget = e.target;
            const file = inputTarget.files[0];

            if (file) {
                const reader = new FileReader();

                reader.addEventListener("load", function(e) {
                    const readerTarget = e.target;

                    picture__img.src = readerTarget.result;

                    pictureImage.innerHTML = "";
                    image_reder.appendChild(img);
                });

                reader.readAsDataURL(file);
            } else {
                pictureImage.innerHTML = pictureImageTxt;
            }
        });
    </script>
@endsection
