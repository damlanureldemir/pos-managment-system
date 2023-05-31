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
                    <a href="{{route('orders.create')}}" type="button" class="nav-link btn btn-success create-new-button">+ Yeni sipariş Ekle</a>
                </li>
                <br>
            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <div class="col-12 grid-margin">
                                <h4 class="card-title">Sipariş Listesi</h4>
                                <table class="table_t">
                                    <thead>
                                    <tr>
                                        <th> Sipariş Adı </th>
                                        <th> Ürünün resmi </th>
                                        <th> indirim(%)</th>
                                        <th> Marka </th>
                                        <th> Fiyat</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $orders)
                                        <tr>
                                            @foreach($product as $product)
                                            <td> {{ $product->product_name }}</td>
                                            <td>
                                                <br>
                                                <img height="100" width="100" src="{{asset($product->image)}}" >
                                                <br>
                                            </td>
                                                <td>{{ $product->quantity }}</td>
                                                <td> {{ $product->brand }}</td>
                                                <td> {{ $product->price }}</td>
                                            @endforeach
                                            <td>
                                                <a href="" class="mdi mdi-account-edit badge badge-outline-success" title="siparişi düzenle">
                                                </a>
                                                <a  href="{{route('orders.delete',$orders->id)}}" onclick="return confirm('Silmek istediğinizden emin misiniz?')" class="mdi mdi-delete badge badge-outline-danger" title="sil">
                                                </a>
                                            </td>
                                               @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col md-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>TOTAL 0.00</h4>
                            </div>
                            <div class="card-body">
                                ....
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
                <script>
                    setTimeout(function() {
                        var messageElement = document.querySelector('.alert');
                        if (messageElement) {
                            messageElement.style.display = 'none';
                        }
                    }, 5000);
                </script>


