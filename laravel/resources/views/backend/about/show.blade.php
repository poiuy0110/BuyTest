@extends('backend.layouts.master') 

@section('title', 'About Edit') 

@section('content')

<div class="container">
    <h3 for="content" class="text-center">關於我們</h3>

        <table class="table table-stripped table-bordered">
            
            <tr>
                <th class="info" width="100">發布時間:</th>
                <td>{{$about->post_date}}</td>
            </tr>
            <tr>
                <th class="info">標題:</th>
                <td>{{$about->title}}</td>
            </tr>
            <tr>
                <th class="info">主題:</th>
                <td>{{$about->subject}}</td>
            </tr>
            <tr>
                <th class="info">說明:</th>
                <td>{!! nl2br($about->desp) !!}</td>
            </tr>
            <tr>
                <th class="info">顯示:</th>
                <td>@if ($about->vw == 1)
                        <span class='badge badge-success'>Y</span>
                    @else
                        <span class='badge badge-danger'>N</span>
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <a href="/admin/about" class="btn btn-sm btn-light">取消</a>
                    <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-sm btn-primary">修改</a>
                </td>
            </tr>
        </table> 


</div>

@endsection