<div id="invoice-POS">
    {{--print section--}}

    <div id="printed_content">

        <center id="logo">
            <div class="logo"></div>
            <div class="info"></div>
            <h2>POS</h2>
        </center>
    </div>

    <div class="mid">
        <div class="info">
            <h2>iletisim</h2>
            <p>
                Address:elazig
                Email:laravelpos@gmail.com
                Phone:1234567
            </p>
        </div>
    </div>
    <div class="bot">
        <div id="table">
            <table>
                <tr class="tabletitle">
                    <td class="item"><h2>Kategori</h2></td>
                    <td class="Hours"><h2>Adet</h2></td>
                    <td class="Rate"><h2>Indirim</h2></td>
                    <td class="Rate"><h2>Toplam</h2></td>

                </tr>

                @foreach($order_receipt as $receipt  )
                <tr class="service">
                    <td class="tableitem"><p class="itemtext">{{$receipt->product_name}}</p></td>
                    <td class="tableitem"><p class="itemtext">{{number_format($receipt->unitprice,2)}}</p> </td>
                    <td class="tableitem"><p class="itemtext">{{$receipt->quantity}}</p></td>
                    <td class="tableitem"><p class="itemtext">{{$receipt->discount ? '':'0'}}</p></td>
                    <td class="tableitem"><p class="itemtext">{{number_format($receipt->amount,2)}}</p></td>
                </tr>
                @endforeach
                <tr class="tabletitle">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="Rate"><p class="itemtext">Vergi</p></td>
                    <td class="Payment"><p class="itemtext">Total ${{number_format($receipt->amount,2)}}</p></td>
                </tr>
                <tr class="tabletitle">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="Rate">Toplam</td>
                    <td class="Payment">{{number_format($orders_receipt->sum('amount'),2)}}<h2>
                        </h2></td>
                </tr>

            </table>
            <div class="legalcopy">
                <p class="legal"><strong>***Tesekkürler</strong></p>
            </div>
            <div class="serial-number">
                Serial:<span class="serial">
                 123456789
            </span>
                <span>05/06/2023 &nbsp; &nbsp; 16.00 </span>

            </div>

        </div>
    </div>


</div>
<style>
    #invoice-POS{

        padding:2mm;
        margin:0 auto;
        width:58mm;
        background:#fff ;
    }
    #invoice-POS::selection{
        background:#f315f3 ;
        color:#fff;
    }
    #invoice-POS::-moz-selection{
        background:#34495E;
        color:#fff;
    }
    #invoice-POS h1{
        font-size:1.5em;
        color:#222;
    }
    #invoice-POS h2{
        font-size:0.9em;
    }
    #invoice-POS h3{
        font-size:1.2em;
        font-weight: 300;
        line-height: 2em;
    }
    #invoice-POS p{
        font-size:0.7em;
        line-height: 1.2em;
        color:#666;
    }
    #invoice-POS #top,#invoice-POS #mid,#invoice-POS #bot{
        border-bottom: 1px solid #eee;
    }
    #invoice-POS #top{
        min-height: 100px;
    }
    #invoice-POS #mid{
        min-height: 80px;
    }
    #invoice-POS #bot{
        min-height: 50px;
    }
    #invoice-POS #top.logo{
        height:60px;
        width: 60px;
        background-size: 60px 60px;
        border-radius:50px;
    }
    #invoice-POS .info{
        display:block;
        margin-left:0;
        text-align: center;
    }
    #invoice-POS .title{
        float:right;
    }
    #invoice-POS .title.p{
        text-align: right;
    }
    #invoice-POS table{
        width:100%;
        border-collapse: collapse;
    }
    #invoice-POS tabletitle{
        font-size: 0.5em;
        background: #eee;
    }
    #invoice-POS .service{
        border-bottom: 1px solid #eee;
    }
    #invoice-POS .item{
        width: 24mm;
    }
    #invoice-POS .itemtext{
        font-size:0.5em;
    }
    #invoice-POS #legalcopy{
        margin-top: 5mm;
        text-align: center;
    }
    .serial-number{
        margin-top: 5mm;
        margin-bottom: 2mm;
        text-align: center;
        font-size: 12px;
    }
    .serial{
        font-size: 10px !important;
    }

</style>


