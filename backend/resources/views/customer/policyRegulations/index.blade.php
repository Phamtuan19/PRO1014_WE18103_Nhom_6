@extends('customer.layout.index')

@section('link')
    <link rel="stylesheet" href="{{ asset('customer/css/policyRegulation.css') }}">
@endsection

@section('contents')
    <div class="container-fluid mt-1" style="background-color: #fff">
        <div class="row" style="justify-content: center !important;">
            <div class="col-8 paddAllPage">
                <div class="title">
                    <h1 class="paddAllPage__title__h1">{{ $policyRegulation[0]->introduction }}</h1>
                </div>
                <div class="">
                    {!! $policyRegulation[0]->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {{-- <script type="module" src="{{ asset('customer/js/Layout/authListOrder/index.js') }}"></script> --}}
@endsection
