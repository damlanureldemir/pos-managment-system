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
                <li class="col-2 width-right nav-item dropdown d-none d-lg-block">
                    <a href="{{route('products.create')}}" type="button" class="nav-link btn btn-success create-new-button">+ Yeni Ürün Ekle</a>
                </li>
                <br>
                <div class="row ">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12 grid-margin">
                                    <h4 class="card-title">Ürün Listesi</h4>
                                    <table class="table_t">
                                        <thead>
                                        <tr>
                                            <th> Ürün Adı </th>
                                            <th> Ürün Resmi </th>
                                            <th> Fiyat </th>
                                            <th> Miktar </th>
                                            <th> Marka </th>
                                            <th> Kategori </th>
                                            <th> Açıklama </th>
                                            <th> İşlemler </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($product as $rs)
                                            <tr>
                                                <td> {{ $rs->product_name }}</td>
                                                <td>
                                                    <br>
                                                    <img height="100" width="100" src="{{asset($rs->image)}}" >
                                                    <br>
                                                </td>
                                                <td> {{ $rs->price }}</td>
                                                <td>{{ $rs->quantity }}</td>
                                                <td> {{ $rs->brand }}</td>
                                                <td>{{$rs->getCategory->name}} </td>
                                                <td> {{ $rs->description }} </td>
                                                <td>
                                                    <a href="" class="mdi mdi-account-edit badge badge-outline-success">
                                                    </a>
                                                    <a  href="" onclick="return confirm('Silmek istediğinizden emin misiniz?')" class="mdi mdi-delete badge badge-outline-danger">
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
