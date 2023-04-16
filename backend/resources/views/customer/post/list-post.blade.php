@extends('customer.layout.index')

@section('link')
    <link rel="stylesheet" href="{{ asset('customer/css/postList.css') }}">
@endsection

@section('contents')
    <main class="container mt-4">
        <div class="row">
            <section class="col-8 post_list">

            </section>
            <aside class="col-4 sidebar">
                <div class="top-sellers">
                    <h2 style="margin-bottom: 24px">Bài viết có lượt xem cao nhất</h2>
                    <div class="post_top__view">

                    </div>
                </div>
            </aside>
        </div>
    </main>
@endsection

@section('js')
    <script type="module" src="{{ asset('customer/js/Layout/Post-list/index.js') }}"></script>
@endsection
