@extends('backend.layouts.master') 

@section('title', '首頁輪播圖') 

@section('content')

<div class="container">
    <h3 for="content" class="text-center">首頁輪播圖</h3>

    <table class="table table-stripped table-bordered">
            
        <tr>
            <th class="info" width="120">標題:</th>
            <td>{{$indexslide->title}}</td>
        </tr>
        <tr>
            <th class="info" width="120">說明:</th>
            <td>{!! nl2br($indexslide->desp) !!}</td> 
        </tr>
        <tr>
            <th class="info">圖片:</th>
            <td>@isset($indexslide)<img src="{{ asset('uploads/indexslide/'. $indexslide->photo)  }}">@endisset</td>
        </tr>
        <tr>
            <th class="info">URL:</th>
            <td>
                {{$indexslide->url}}
            </td>
        </tr>
        <tr>
        
            <th class="info">顯示:</th>
            <td>@if ($indexslide->vw == 1)
                    <span class='badge badge-success'>Y</span>
                @else
                    <span class='badge badge-danger'>N</span>
                @endif
            </td>
        </tr>
        <tr>
            <th class="info">排序:</th>
            <td>
                {{$indexslide->seq}}
            </td>
        </tr>
  
        
        <tr>
            <td colspan="2" class="text-center">
                <a href="/admin/indexslide" class="btn btn-sm btn-light">取消</a>
                <a href="{{ route('admin.indexslide.edit', $indexslide->id) }}" class="btn btn-sm btn-primary">修改</a>
            </td>
        </tr>
    </table>


</div>

@endsection