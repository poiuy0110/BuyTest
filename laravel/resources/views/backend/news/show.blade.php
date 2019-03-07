@extends('backend.layouts.master') 

@section('title', 'About Edit') 

@section('content')

<div class="container">
    <h3 for="content" class="text-center">關於我們</h3>

        <table class="table table-stripped table-bordered">
            
            <tr>
                <th class="info" width="100">發布時間:</th>
                <td>{{$news->post_date}}</td>
            </tr>
            <tr>
                <th class="info">標題:</th>
                <td>{{$news->title}}</td>
            </tr>
            <tr>
                <th class="info">主題:</th>
                <td>{{$news->subject}}</td>
            </tr>
            <tr>
                <th class="info">說明:</th>
                <td>{!! nl2br($news->desp) !!}</td>
            </tr>
            <tr>
                <th class="info">顯示:</th>
                <td>@if ($news->vw == 1)
                        <span class='badge badge-success'>Y</span>
                    @else
                        <span class='badge badge-danger'>N</span>
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <a href="/admin/news" class="btn btn-sm btn-light">取消</a>
                    <a href="{{ route('admin.news.edit', $news->id) }}" class="btn btn-sm btn-primary">修改</a>
                </td>
            </tr>
        </table> 


</div>

@endsection