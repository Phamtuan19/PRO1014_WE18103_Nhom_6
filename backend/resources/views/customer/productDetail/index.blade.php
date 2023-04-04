@extends('customer.layout.index')
@section('link')
    <link rel="stylesheet" href="{{ asset('customer/css/productDetail.css') }}">
@endsection
@section('contents')
    <div class="container mt-4" style="background: #FFF">
        <div class="row">
            <div class="col-6">
                <div class="detail-box1_img">
                    {{-- Render APi --}}
                </div>
            </div>

            <div class="col-4" style="margin-top: 25px;">
                <div class="product_detail__info">

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6" style="margin-top: 50px">
                <div class="detail-introduce">
                    <h3>Giới thiệu sách</h3>
                </div>
                <div class="detail-box1_describe">
                    <div class="detail__introduction">
                        {{ $product->introduction }}
                    </div>
                    <span href="#" class="keep__reading" data-keep="1">Đọc Tiếp ...</span>
                </div>
            </div>

            <div class="col-6" style="margin-top: 50px">
                <div class="detail-introduce">
                    <h3>Thông tin chi tiết</h3>
                </div>
                <div class="detail-box1_describe">
                    <table class="table table-striped">
                        <tbody class="tbody__table__detail">
                            <tr>
                                <th scope="col" width="30%">Nhà Xuất bản</th>
                                <th scope="col">NXB Văn Học</th>
                            </tr>
                            <tr>
                                <th scope="col" width="30%">Ngày xuất bản:</th>
                                <th scope="col">20/03/2023</th>
                            </tr>
                            <tr>
                                <th scope="col" width="30%">Kích thước:</th>
                                <th scope="col">14.5 x 20.5 x 2.0 cm</th>
                            </tr>
                            <tr>
                                <th scope="col" width="30%">Số trang:</th>
                                <th scope="col">340 trang</th>
                            </tr>
                            <tr>
                                <th scope="col" width="30%">Trọng lượng:</th>
                                <th scope="col">500g</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12 user">
                <div class="user-title">
                    <h3>BÌNH LUẬN</h3>
                </div>
                <div class="user-form">
                    <form action="">
                        <div class="form-group">
                            <textarea name="" id="" placeholder="Nhập nội dung bình luận (tiếng Việt có dấu)..."></textarea>
                            <button type="submit" class="user-button">GỬI BÌNH LUẬN</button>
                        </div>
                    </form>
                </div>
                <div class="user-wrapper">
                    <div class="user-avatar">
                        <img src="/fondend/phungps24202/assets/image/avatar-facebook-doc.jpg" alt="User Avatar" />
                    </div>
                    <div class="comment-body">
                        <h4 class="comment-user">John Doe</h4>
                        <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor
                            incididunt ut labore et dolore magna aliqua.</p>
                        <span class="comment-time">2 hours ago</span>
                    </div>
                </div>
                <div class="user-wrapper">
                    <div class="user-avatar">
                        <img src="/fondend/phungps24202/assets/image/avatar-facebook-doc.jpg" alt="User Avatar" />
                    </div>
                    <div class="comment-body">
                        <h4 class="comment-user">John Doe</h4>
                        <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor
                            incididunt ut labore et dolore magna aliqua.</p>
                        <span class="comment-time">2 hours ago</span>
                    </div>
                </div>

            </div>
            <div class="col-12">
                <div class="related-title">
                    <h2>Sách Cùng Lĩnh Vực</h2>
                </div>
                <div class="container-fluid">
                    <div class="row related-book">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="module" src="{{ asset('customer/js/productDetail.js') }}"></script>
@endsection
