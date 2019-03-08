@extends('backend.layouts.master') 

@section('title', '主題活動') 

@section('content')

<div class="container">
    <h3 for="content" class="text-center">主題活動</h3>

    @isset($news)
        <form method="POST" action="{{ route('admin.news.update', $news->id) }}" enctype="multipart/form-data">
    @else
        <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
    @endisset        

            @isset($news)
                {{ method_field("PUT") }}
                <input type="hidden" name="id" value="{{$news->id}}">
            @endisset
            
        <table class="table table-stripped table-bordered">
            
            <tr>
                <th class="info">發布時間:</th>
                <td><input name="post_date" value="@isset($news){{$news->post_date}}@endisset" class="jdate"></td>
            </tr>
            <tr>
                <th class="info">標題:</th>
                <td><input name="title" value="@isset($news){{$news->title}}@endisset" style="width:100%"></td>
            </tr>
            <tr>
                <th class="info">主題:</th>
                <td><input name="subject" value="@isset($news){{$news->subject}}@endisset" style="width:100%"></td>
            </tr>
            <tr>
                <th class="info">說明:</th>
                <td><textarea name="desp" style="width:100%" rows="5" id="desp" class="ckeditor_set">@isset($news){{$news->desp}}@endisset</textarea> </td>
            </tr>
            <tr>
                <th class="info">顯示:</th>
                <td><input type="checkbox" name="vw" value="1" @isset($news){{$news->vw==1?'checked':''}}@endisset></td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <a href="/admin/news" class="btn btn-sm btn-light">取消</a>
                    <input type="submit" value="送出" class="btn btn-sm btn-primary">
                </td>
            </tr>
        </table>
    </form>    


</div>

@endsection
