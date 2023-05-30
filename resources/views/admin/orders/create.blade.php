@extends('front.master')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                        <div class="col-4 col-sm-3 col-xl-2">
                        </div>
                        <div class="col-3 col-sm-2 col-xl-2 ps-0 text-center">
                      <span>
                      </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Yeni Sipariş Ekle</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <form action="{{route('orders.store')}}" method="POST" enctype="multipart/form-data"  >
                                        @csrf
                                        <div class="form-group">
                                            <label>Ürünün ismi</label>
                                            <select class="form-control product_id" name="product_id" required>
                                                <option value="">ürün seçin</option>
                                                @foreach ($product as $product)
                                                    <option value="{{$product->id}}">{{$product->product_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="" >Miktar</label>
                                            <input  class="form-control" name="qty" required="" placeholder="Ürün miktarını giriniz" >
                                        </div>
                                        <div class="form-group">
                                            <label for="" >indirim</label>
                                            <input  class="form-control" name="Dis" required="" placeholder="Ürün indirimini giriniz" >
                                        </div>
                                        <div class="form-group">
                                            <label for="" >Fiyat</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-primary text-white">$</span>
                                                </div>
                                                <input name="price" type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Siparişi Ekle</button>
                                    </form>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


@endsection

