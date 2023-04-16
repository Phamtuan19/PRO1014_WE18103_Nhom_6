@extends('admin.layout.index')

@section('link_css')
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
            max-width: 100%;
        }
    </style>
@endsection

@section('contents')
    <div class="content-wrapper">

        @if (session('msg'))
            <div class="alert alert-success text-center">
                {{ session('msg') }}
            </div>
        @endif

        <h4 class="card-title">Chỉnh sửa bài viết</h4>

        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @method("PATCH")
            @csrf

            <div class="row" style="background: #fff; padding: 42px 24px;">
                <div class="col-6 form-group">
                    <label for="title">Tên bài viết</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Tên bài viết"
                        value="{{ !empty(old('title')) ? old('title') : $post->title }}">
                    @error('title')
                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-6 form-group">
                    <label for="slug">slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Tên bài viết"
                        value="{{ !empty(old('slug')) ? old('slug') : $post->slug }}">
                    @error('slug')
                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-6 form-group">
                    <label for="introduction">Nội dung tóm tắt</label>
                    <input type="text" class="form-control" id="introduction" name="introduction"
                        placeholder="Tên bài viết"
                        value="{{ !empty(old('introduction')) ? old('introduction') : $post->introduction }}">
                    @error('introduction')
                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                    @enderror
                </div>

                {{-- <div class="col-6 form-group">
                    <label for="product">Sản phẩm</label>
                    <select class="form-control" id="product" name="product" style="line-height: 32px;"
                        value="{{ old('product') }}">
                        <option>1</option>
                        <option>2</option>
                    </select>
                    @error('product')
                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                    @enderror
                </div> --}}
                <div class="col-12 form-group">
                    <label for="">Thêm hình ảnh đại điện</label>
                    <label class="picture" for="picture__input" tabIndex="0">
                        <span class="picture__image">
                            <img src="{{ $post->image_url }}" class="picture__img">
                        </span>
                    </label>

                    <input type="file" name="image" id="picture__input"
                        value="">
                    @error('image')
                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-12 form-group">
                    <label for="content">Nội dung chính</label>
                    <textarea class="form-control" id="exampleTextarea1" name="content" rows="4">{{ !empty(old('content')) ? old('content') : $post->content }}</textarea>
                    @error('content')
                        <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
        $(document).ready(function() {
            $("#title").keyup(function() {
                $("#slug").val(renSlug($(this).val()))
            });

            $("#slug").val(renSlug($("#title").val()))

            $(".select2").select2({
                placeholder: "Lựa chọn sản phẩm",
                // allowClear: true
            })

            $(".select2_category").select2({
                placeholder: "Lựa chọn sản phẩm",
                // allowClear: true
            })
        });
    </script>
    <script>
        const inputFile = document.querySelector("#picture__input");
        const pictureImage = document.querySelector(".picture__image");
        const picture__img = document.querySelector(".picture__img");
        const pictureImageTxt = "Choose an image";

        inputFile.addEventListener("change", function(e) {
            const inputTarget = e.target;
            const file = inputTarget.files[0];

            if (file) {
                const reader = new FileReader();

                reader.addEventListener("load", function(e) {
                    const readerTarget = e.target;

                    picture__img.src = readerTarget.result;
                });

                reader.readAsDataURL(file);
            } else {
                pictureImage.innerHTML = pictureImageTxt;
            }
        });
    </script>
@endsection
