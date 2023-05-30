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
                            <div class="col-12 grid-margin">
                                <h4 class="card-title">Sipariş Listesi</h4>
                                <table class="table_t">
                                    <thead>
                                    <tr>
                                        <th> Sipariş Adı </th>
                                        <th> miktar </th>
                                        <th> Fiyat </th>
                                        <th> indirim(%)</th>
                                        <th> Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                            <select name="product_id" id="product_id" class="form-control product_id">
                                                @foreach($product as $product)
                                                <option value="{{$product->id}}">{{$product->product_name}}</option>
                                            </select>
                                            </td>
                                            <td>
                                                <input type="number" name="quantity[]" id="quantity" class="form-control">
                                            </td>
                                            <td>
                                                <input type="number" name="price[]" id="price" class="form-control">
                                            </td>
                                            <td>
                                                <input type="number" name="discount[]" id="discount" class="form-control">
                                            </td>
                                            <td>
                                                <input type="number" name="total_miktar[]" id="total" class="form-control">
                                            </td>
                                            <td>
                                                <a href="" class="mdi mdi-account-edit badge badge-outline-success" title="siparişi düzenle">
                                                </a>
                                                <a  href="" onclick="return confirm('Silmek istediğinizden emin misiniz?')" class="mdi mdi-delete badge badge-outline-danger" title="sil">
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

