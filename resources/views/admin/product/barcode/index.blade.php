@extends('front.master')
@section('content')
    <head>
        <style type="text/css">
            .table_t{
                margin:auto;
                width: 100%;
                margin-top: 20px;

            }
        </style>
    </head>
    <div class="main-panel">
        <div class="content-wrapper">

            @if(session()->has('message'))
                <div class="alert alert-success">
                    <strong>Başarılı!</strong>
                    {{session()->get('message')}}
                </div>
            @endif
            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <div class="col-12 grid-margin">
                                <h4 class="card-title">Barkod Listesi</h4>
                                <div class="card-body">
                                    <div id="print">
                                        <div class="row">
                                            @foreach($productsBarcode as $barcode)
                                                <div class="col-lg-3 col-md-4 col-sm-12 mt-3 text-center">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            {!! $barcode->barcode !!}
                                                            <h4 class="text-center" style="padding: 1em; margin-top: 2em">{{$barcode->product_code}}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
