@extends('backend.layouts.master') 
@push('head')
<script src="{{ asset('js/backOrder.js') }}"></script>
@endpush
@section('title', '訂單管理') 

@section('content')

<div class="container">
    <h3 for="content" class="text-center">訂單管理</h3>
    <meta name="csrf_token" content="{{ csrf_token() }}">

    <table class="table table-stripped table-bordered">

        <tr>
            <td colspan="6">
                @if ($orders->status == 1)
                    <a href="{{ route('admin.orders.confirm', $orders->id) }}" class="btn btn-sm btn-primary">訂單確認</a>
                @endif
                @if ($orders->status == 2)
                    <a href="{{ route('admin.orders.confirmCancel', $orders->id) }}" class="btn btn-sm btn-warning">取消訂單確認</a>
                    <a href="{{ route('admin.orders.shipConfirm', $orders->id) }}" class="btn btn-sm btn-success"  id="updateShipNo">出貨確認</a>
                @endif
                @if ($orders->status == 3)
                    <a href="{{ route('admin.orders.shipConfirmCancel', $orders->id) }}" class="btn btn-sm btn-warning">取消出貨確認</a>
                @endif
            </td>
        </tr>
        <input type="hidden" id="id" value="{{ $orders->id }}">
        <tr>
            <th class="info" width="120" colspan="6">訂單資料:</th>
        </tr>
        <tr>
            <th  width="120">訂單編號:</th>
            <td>{{ $orders->odr_no }}</td> 
            <th  width="120">訂單日期:</th>
            <td>{{ $orders->odr_date }}</td> 
            <th  width="120">訂單狀態:</th>
            <td>{{ $orders->status_str }}</td> 
        </tr>
        <tr>
            <th  width="120">銷貨金額:</th>
            <td>{{ $orders->amount }}</td> 
            <th  width="120">稅額:</th>
            <td>{{ $orders->tax }}</td> 
            <th  width="120">銷貨總額:</th>
            <td>{{ $orders->total }}</td> 
        </tr>
        <tr>
            <th  width="120">運費:</th>
            <td>{{ $orders->shipping }}</td> 
            <th  width="120">付款方式:</th>
            <td>{{ $orders->pay_str }}</td> 
            <th  width="120">配送方式:</th>
            <td>{{ $orders->ship_str }}</td> 
        </tr>




        <tr>
            <th class="info" width="120" colspan="6">會員資料:</th>
        </tr>
        <tr>
            <th  width="120">會員編號:</th>
            <td>{{ $orders->mem_id }}</td> 
            <th  width="120">會員名稱:</th>
            <td>{{ $orders->mem_name }}</td> 
            <th  width="120">會員帳號:</th>
            <td>{{ $orders->login_id }}</td> 
        </tr>


        <tr>
            <th class="info" width="120" colspan="6">訂購資料:</th>
        </tr>
        <tr>
            <th  width="120">訂購人姓名:</th>
            <td>{{ $orders->bill_to }}</td> 
            <th  width="120">訂購人手機:</th>
            <td colspan="3">{{ $orders->bill_mobile }}</td> 
        </tr>

        <tr>
            <th  width="120">訂購人地址:</th>
            <td colspan="5">{{ $orders->bill_address }}</td> 
        </tr>

        <tr>
            <th  width="120">訂購人Email:</th>
            <td colspan="5">{{ $orders->bill_email }}</td> 
        </tr>

        <tr>
            <th class="info" width="120" colspan="6">送貨資料:</th>
        </tr>
        <tr>
            <th  width="120">收貨人:</th>
            <td>{{ $orders->ship_to }}</td> 
            <th  width="120">連絡電話:</th>
            <td>{{ $orders->ship_mobile }}</td> 
            <th  width="120">出貨單號:</th>
            <td>
                @if ($orders->status == 2)
                    <input name="ship_no" id="ship_no" value="{{ $orders->ship_no }}">
                @else
                    {{ $orders->ship_no }}
                @endif
            </td> 
        </tr>

        <tr>
            <th  width="120">收貨地址:</th>
            <td colspan="5">{{ $orders->ship_address }}</td> 
        </tr>

        
        <tr>
            <td colspan="6  " class="text-center">
                <a href="/admin/orders" class="btn btn-sm btn-light">取消</a>
                <a href="{{ route('admin.orders.edit', $orders->id) }}" class="btn btn-sm btn-primary">修改</a>
            </td>
        </tr>
    </table>


    <table class="table table-stripped table-bordered">
        <tr>
            <th width="120" class="info">商品名稱</th>
            <th  width="120" class="info">單價</th>
            <th  width="120" class="info">數量</th>
            <th  width="120" class="info">金額</th>
        </tr>
        @foreach ($lists as $obj) 
        <tr>
            <td class="align-left">{{$obj->prod_name}}</td>
            <td class="align-right">{{ number_format($obj->price) }}</td>
            <td class="align-right">{{ number_format($obj->qty) }}</td>
            <td class="align-right">{{ number_format($obj->amount) }}</td>
        </tr>
        @endforeach

    </table>
</div>

@endsection