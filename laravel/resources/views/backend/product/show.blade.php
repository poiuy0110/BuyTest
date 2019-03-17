@extends('backend.layouts.master') 

@section('title', '商品管理') 

@section('content')

<div class="container">
    <h3 for="content" class="text-center">商品管理</h3>

    <table class="table table-stripped table-bordered">
            
        <tr>
            <th class="info" width="120">名稱:</th>
            <td>{{$product->name}}</td>
        </tr>
        <tr>
            <th class="info" width="120">說明:</th>
            <td>{!! nl2br($product->desp) !!}</td> 
        </tr>
        <tr>
            <th class="info">圖片:</th>
            <td>@isset($product)<img src="{{ asset('uploads/product/'. $product->photo)  }}">@endisset</td>
        </tr>
        <tr>
            <th class="info">單價:</th>
            <td>
                {{$product->price}}
            </td>
        </tr>
        <tr>
        <tr>
                <th class="info">庫存:</th>
                <td>
                    {{$product->qty}}
                </td>
            </tr>
        <tr>
            <th class="info">顯示:</th>
            <td>@if ($product->vw == 1)
                    <span class='badge badge-success'>Y</span>
                @else
                    <span class='badge badge-danger'>N</span>
                @endif
            </td>
        </tr>
        <tr>
            <th class="info">熱門:</th>
            <td>@if ($product->hot == 1)
                    <span class='badge badge-success'>Y</span>
                @else
                    <span class='badge badge-danger'>N</span>
                @endif
            </td>
        </tr>
        <tr>
                <th class="info">最新:</th>
                <td>@if ($product->new == 1)
                        <span class='badge badge-success'>Y</span>
                    @else
                        <span class='badge badge-danger'>N</span>
                    @endif
                </td>
            </tr>
        
        <tr>
            <td colspan="2" class="text-center">
                <a href="/admin/product" class="btn btn-sm btn-light">取消</a>
                <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-sm btn-primary">修改</a>
            </td>
        </tr>
    </table>


</div>

@endsection