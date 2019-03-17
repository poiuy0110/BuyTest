@extends('backend.layouts.master') 

@section('title', '商品管理') 

@section('content')

<div class="container">
    <h3 for="content" class="text-center">商品管理</h3>

    @isset($product)
        <form method="POST" action="{{ route('admin.product.update', $product->id) }}" enctype="multipart/form-data">
    @else
        <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
    @endisset        

            @isset($product)
                {{ method_field("PUT") }}
                <input type="hidden" name="id" value="{{$product->id}}">
            @endisset
            
            {{ csrf_field() }}    

           
            
        <table class="table table-stripped table-bordered">


            <tr>
                <th class="info">類別:</th>
                <td>
                    <select name="cat_id">
                            <option value="">[無]</option>
                        @foreach ($cat_lists as $obj)
                            <option value="{{$obj->id}}" @isset($product){{$product->cat_id==$obj->id?'selected':''}}@endisset>{{$obj->name}}</option>
                        @endforeach
                    </select>   
                </td>
            </tr>
            
            <tr>
                <th class="info">名稱:</th>
                <td><input name="name" value="@isset($product){{$product->name}}@endisset" ></td>
            </tr>
            <tr>
                <th class="info">說明:</th>
                <td><textarea name="desp" style="width:100%" rows="5" class="ckeditor_set">@isset($product){{$product->desp}}@endisset</textarea></td>
            </tr>
            <tr>
                <th class="info">圖片:</th>
                <td><input name="photo" type="file">@isset($product)<img src="{{asset('uploads/product/'. $product->photo)}}">@endisset</td>
            </tr>
            <tr>
                <th class="info">單價:</th>
                <td><input name="price" value="@isset($product){{$product->price}}@endisset" size="10"></td>
            </tr>
            <tr>
                <th class="info">庫存數:</th>
                <td><input name="qty" value="@isset($product){{$product->qty}}@endisset" size="10"></td>
            </tr>
            <tr>
                <th class="info">顯示:</th>
                <td><input type="checkbox" name="vw" value="1"  @isset($product){{$product->vw==1?'checked':''}}@endisset ></td>
            </tr>
            <tr>
                <th class="info">熱門:</th>
                <td><input type="checkbox" name="hot" value="1"  @isset($product){{$product->hot==1?'checked':''}}@endisset ></td>
            </tr>
            <tr>
                <th class="info">最新商品:</th>
                <td><input type="checkbox" name="new" value="1"  @isset($product){{$product->new==1?'checked':''}}@endisset ></td>
            </tr>
            
            
            <tr>
                <td colspan="2" class="text-center">
                    <a href="/admin/product" class="btn btn-sm btn-light">取消</a>
                    <input type="submit" value="送出" class="btn btn-sm btn-primary">
                </td>
            </tr>
        </table>
    </form>    


</div>
@endsection
