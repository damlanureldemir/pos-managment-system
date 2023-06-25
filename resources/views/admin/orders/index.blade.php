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
                                                <a href="{{route('orders.edit',$orders->id)}}" class="mdi mdi-account-edit badge badge-outline-success" title="siparişi düzenle">
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
                                <div class="panel">
                                    <div class="row">
                                        <table class="table table-striped">
                                            <tr>
                                                <td>
                                                    <label for=""><Müsteri adi</label>
                                                    <input type="text" name="customer_name" id="" class="form-control">
                                                </td>
                                                <td>
                                                    <label for=""><Müsteri telefonu</label>
                                                    <input type="text" name="customer_phone" id="" class="form-control">
                                                </td>
                                            </tr>
                                        </table>

                                        <td>ödeme yöntemi</td>
                                        <span class="radio-item">

<input type="radio" name="payment method" id="payment method"
    class="true" value="cash" checked="checked">
<label for="payment method"> <i class="fa fa-money-bill text-success"></i> pesin</label>
</span>

<span class="radio-item">
<input type="radio" name="payment method" id="payment method" class="true" value="bank transfer" checked="checked">
<label for="payment method"> <i class="fa fa-university text-danger"></i>transfer </label>
</span>

<span class="radio-item">

<input type="radio" name="payment method" id="payment method"

       class="true" value="credit Card" checked="checked">

<label for="payment method"> <i class="fa fa-credit-card text-info"></i> kart</label>

</span>
 </td> <br>
                                        <td>
                                            ödeme
                                            <input type="number" name="paid_amount" class="form-control">
                                        </td>
                                        <td>
                                         degisiklik
                                            <input type="number" name="balance" class="form-control">
                                        </td>
  </div>
                                    </div>
                            <div class="card-body">
                      <button type="button"
                                   onlick="PrintReceiptContent('print')"
                                   class="btn btn-dark"><i class="fa fa-print"></i>Yazdir
                               </button>
                                <button type="button"
                                        onlick="PrintReceiptContent('print')"
                                        class="btn btn-primary"><i class="fa fa-print"></i>tarih
                                </button>
                                <button type="button"
                                        onlick="PrintReceiptContent('print')"
                                        class="btn btn-danger"><i class="fa fa-print"></i>rapor
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <div class="modal">
                    <div id="print">
                        @include('reports.receipt')
                </div>
                </div>
                / Print Section

                function PrintReceiptContent(el) {

                var data =<input type="button" id="printPageButton'+
                 'class=" printPageButton" style="display:block;'+
                'width="100%";border:none;background-color:#00BB8B; color:#fff'+
                'padding:14px 28px;font-size:16px; cursor:pointer;text-align:center

                    data += document.getElementById(el).innerHTML;
                myReceipt.document.title="Print Receipt";

                myReceipt = window.open("", "myWin", "left-150, top-130, width=400, height=400

                myReceipt.screnx = 0;

                myReceipt.screny = 0;

                <script>
                    setTimeout(function() {
                        var messageElement = document.querySelector('.alert');
                        if (messageElement) {
                            messageElement.style.display = 'none';
                        }
                    }, 5000);

                </script>
@endsection

