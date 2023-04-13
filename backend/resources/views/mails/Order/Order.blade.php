<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('customer/css/order/successfully.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>

    <style>
        .inform {
            display: flex !important;
            flex-wrap: wrap !important;
        }

        .item {
            display: flex;
            gap: 0 24px !important;
            width: 50% !important;
        }
    </style>
</head>

<body>

    <body>
        <div class="container">
            <div class="form-container">
                <div class="logo" style="padding: 20px 0; text-align: center; margin: 0 auto;">
                    <a href="" class="">
                        <img src="https://book365.vn/bitrix/templates/book365-2021/images/edu-2021/logo_book365.png"
                            alt="" style="width: 50%;">
                    </a>
                </div>
                <p class="text-thankyou">Xin cảm ơn quý khách đã quan tâm và sử dụng dịch vụ của chúng tôi</p>
                <h2>Thông tin đơn hàng</h2>
                <div class="inform" style="display: flex !important; flex-wrap: wrap !important; margin: 12px 0;">
                    <div class="item">
                        <p class="item-left">Người Nhận: </p>
                        <p>{{ $data['address']->name }}</p>
                    </div>
                    <div class="item">
                        <p class="item-left">Số điện thoại: </p>
                        <p>{{ $data['address']->phone }}</p>
                    </div>
                    <div class="item">
                        <p class="item-left">Email: </p>
                        <p>{{ $data['address']->email }}</p>
                    </div>
                    <div class="item">
                        <p class="item-left">Mã đơn hàng: </p>
                        <p>{{ $data['order']->code_order }}</p>
                    </div>
                    <div class="item">
                        <p class="item-left">Thời gian đặt hàng: </p>
                        <p>{{ $data['order']->created_at }}</p>
                    </div>
                    <div class="item">
                        <p class="item-left">Tổng tiền: </p>
                        <p>{{ $data['order']->total_price }}đ</p>
                    </div>
                    <div class="item">
                        <p class="item-left">Địa chỉ: </p>
                        <p>{{ $data['address']->province_city }} - {{ $data['address']->county_district }} -
                            {{ $data['address']->house_number_street_name }}</p>
                    </div>
                    <div class="item">
                        <p class="item-left">Thời gian giao hàng dự kiến: </p>
                        <p>4-5 ngày kể từ ngày xác nhận đơn hàn</p>
                    </div>
                </div>
                <table class="table table-bordered  mt-3">
                    <thead>
                        <tr>
                            <th scope="col" width="5%">STT</th>
                            <th scope="col" width="15%">Mã SP</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['order']->detail as $index => $detail)
                            <tr>
                                <th scope="row">{{ $index }}</th>
                                <th scope="row">{{ $detail->product_code }}</th>
                                <td class="text-center">
                                    <img src="{{ $detail->product->image[0]->image_url }}" alt=""
                                        style="	width: 60px;">
                                </td>
                                <td>{{ $detail->product->name }}</td>
                                <td class="price">{{ $detail->price_sale ? $detail->price_sale : $detail->price }}
                                </td>
                                <td>2</td>
                                <td>{{ $detail->total_price }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </body>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
