@extends('customer.layout.index')

@section('link')
    <link rel="stylesheet" href="{{ asset('customer/css/post-item.css') }}">
@endsection

@section('contents')
    <div class="container">
        <div class="row mt-4">
            <div class="col-8 ">
                <div class="detail_article">
                    <div class="post_item__detail">
                        <div class="">
                            <div class="news-name">Bài học từ hươu cao cổ</div>
                            <span class="date">25.3.2023</span>
                        </div>
                        <div class="news_detail">

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4 ">
                <div class="sidebar">
                    <div class="categories">
                        <h2>Tin cùng chuyên mục</h2>
                        <a class="featured_fluid"
                            href="http://127.0.0.1:8000/bai-viet/bai-du-thi-viet-cam-nhan-ve-mot-cuon-sach-ma-em-yeu-thich-25-mau"
                            style="margin-bottom: 24px;">
                            <div class="set-bg"
                                style="width: 365px; height: 100px; margin-right: 12px; background-image: url(https://res.cloudinary.com/dizwixa7c/image/upload/v1681293962/PRO1014_WE18103_Nhom_6/Products/ek29bl3xqehgxafu3u9y.jpg)">
                            </div>

                            <div class="overlay" style="gap: 5px;">
                                <h3 class="top_view__name">Bài dự thi Viết cảm nhận về một cuốn sách mà em yêu thích (25
                                    mẫu)</h3>
                                <p class="post__introduction">Đọc sách là một trong những cách giúp bạn học thêm nhiều thứ
                                    về cuộc sống, những trải nghiệm mà có thể bạn chưa từng có. Đây cũng là thói quen tìm
                                    thấy ở rất nhiều người thành công. Sau đây Hải Triều sẽ review TOP những cuốn sách hay
                                    nên đọc nhất mọi thời đại.</p>
                                <div class="d-flex gap-3">
                                    <p>Admin</p>
                                    <p>2023-04-12 17:06:03</p>
                                    <p>view: 0</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="module" src="{{ asset('customer/js/Layout/Post-Item/index.js') }}"></script>
@endsection
