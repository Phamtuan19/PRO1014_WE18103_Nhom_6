@extends('admin.layout.index')

@section('contents')
    <div class="content-wrapper">
        <div class="page-header">

            @if (session('msg'))
                <div class="alert alert-success text-center">
                    {{ session('msg') }}
                </div>
            @endif


            <h3 class="page-title"> Danh sách danh mục </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="" style="color: #0d6efd; font-weight: 600">Thêm mới tác giả </a>
                    </li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Mã </th>
                                    <th> Số tiền giảm </th>
                                    <th> Nội dung </th>
                                    <th> Số lượng </th>
                                    <th> Áp dụng </th>
                                    <th> Hết hạn </th>
                                    <th> Còn lại </th>
                                    <th> Ngày tạo </th>
                                    <th width="5%">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($discountCode as $index => $item)
                                    <tr>
                                        <td> {{ $index + 1 }} </td>
                                        <td> {{ $item->discount_code }} </td>
                                        <td> {{ $item->percentage_decrease }} </td>
                                        <td> {{ $item->content }} </td>
                                        <td> {{ $item->quantity }} </td>
                                        <td> {{ $item->time_application }} </td>
                                        <td> {{ $item->expired }} </td>
                                        <td>
                                            @if ($item->remaining_quantity == $item->quantity)
                                                {{ $item->remaining_quantity }}
                                            @else
                                                <button class="btn btn-gradient-danger btn-fw"
                                                    style="padding: 6px 12px; min-width: 100px">Hết</button>
                                            @endif
                                        </td>
                                        <td> {{ date_format($item->created_at, 'd-m-Y') }} </td>
                                        <td>
                                            <div class="d-flex justify-content-between">
                                                <a href="{{ route('admin.discountcode.show', $item->id) }}" class=""
                                                    style="color: black; padding: 6px">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-3" style="float: right;">
                            {{-- {{ $authors->appends(request()->all())->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
