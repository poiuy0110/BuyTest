@extends('backend.layouts.master') 

@section('title', '類別設定') 

@section('content')

<div class="container">
    <h3 for="content" class="text-center">類別設定</h3>

    <table class="table table-stripped table-bordered">
            
        <tr>
            <th class="info" width="120">名稱:</th>
            <td>{{$category->name}}</td>
        </tr>
        <tr>
            <th class="info" width="120">說明:</th>
            <td>{!! nl2br($category->desp) !!}</td> 
        </tr>
        <tr>
            <th class="info">圖片:</th>
            <td>@isset($category)<img src="{{ asset('uploads/category/'. $category->photo)  }}">@endisset</td>
        </tr>
        <tr>
            <th class="info">顯示:</th>
            <td>@if ($category->vw == 1)
                    <span class='badge badge-success'>Y</span>
                @else
                    <span class='badge badge-danger'>N</span>
                @endif
            </td>
        </tr>
        <tr>
            <th class="info">熱門:</th>
            <td>@if ($category->hot == 1)
                    <span class='badge badge-success'>Y</span>
                @else
                    <span class='badge badge-danger'>N</span>
                @endif
            </td>
        </tr>
        <tr>
            <th class="info">排序:</th>
            <td>@isset($category){{$category->seq}}@endisset</td>
        </tr>
        <tr>
            <td colspan="2" class="text-center">
                <a href="/admin/category" class="btn btn-sm btn-light">取消</a>
                <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-sm btn-primary">修改</a>
            </td>
        </tr>
    </table>


</div>

@endsection