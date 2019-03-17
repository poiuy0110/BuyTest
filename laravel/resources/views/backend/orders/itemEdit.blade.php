@extends('backend.layouts.master') 

@section('title', '訂單管理') 

@section('content')

<div class="container">
    <h3 for="content" class="text-center">訂單管理</h3>

    @isset($odrItem->id)
        <form method="POST" action="{{ route('admin.orders.itemUpdate', $odrItem->id) }}" enctype="multipart/form-data">
    @else
        <form method="POST" action="{{ route('admin.orders.itemStore') }}" enctype="multipart/form-data">
    @endisset        

            @isset($odrItem->id)
                {{ method_field("PUT") }}
                <input type="hidden" name="id" value="{{$odrItem->id}}">
            @endisset
                <input type="hidden" name="odr_id" value="{{$odrItem->odr_id}}">
            {{ csrf_field() }}    

           
            
        <table class="table table-stripped table-bordered">


            <tr>
                <th class="info">商品編號:</th>
                <td><input name="prod_id" value="@isset($odrItem){{$odrItem->prod_id}}@endisset" class="prod_complete" id="prod_id"></td>
            </tr>
            
            <tr>
                <th class="info">單價:</th>
                <td><input name="price" value="@isset($orders){{$orders->price}}@endisset" size="10" id="price"></td>
            </tr>

            <tr>
                <th class="info">數量:</th>
                <td><input name="qty" value="@isset($orders){{$orders->qty}}@endisset" size="10"></td>
            </tr>

            <tr>
                <th class="info">金額:</th>
                <td><input name="amount" value="@isset($orders){{$orders->amount}}@endisset" size="10"></td>
            </tr>
            
            
            
            <tr>
                <td colspan="2" class="text-center">
                    <a href="/admin/orders" class="btn btn-sm btn-light">取消</a>
                    <input type="submit" value="送出" class="btn btn-sm btn-primary">
                </td>
            </tr>
        </table>
    </form>    


</div>
<script type="text/javascript">


    $(function(){
    
        $("#prod_id").on("blur", function(){
    
            var prod_id = $(this).val();
    
            $.ajax(
                {
                    url:"/admin/product/getPrice",
                    data:{"prod_id":prod_id},
                    method:"get",
                    success:function(data){
                        $("#price").val(data);
                    }   
            });
    
    
    
    
        });
    
    
    
    
    });
    </script>
@endsection
