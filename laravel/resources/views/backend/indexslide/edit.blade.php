@extends('backend.layouts.master') 

@section('title', '首頁輪播圖') 

@section('content')

<div class="container">
    <h3 for="content" class="text-center">首頁輪播圖</h3>

    @isset($indexslide)
        <form method="POST" action="{{ route('admin.indexslide.update', $indexslide->id) }}" enctype="multipart/form-data">
    @else
        <form method="POST" action="{{ route('admin.indexslide.store') }}" enctype="multipart/form-data">
    @endisset        

            @isset($indexslide)
                {{ method_field("PUT") }}
                <input type="hidden" name="id" value="{{$indexslide->id}}">
            @endisset
            
            {{ csrf_field() }}    

           
            
        <table class="table table-stripped table-bordered">


            
            <tr>
                <th class="info">標題:</th>
                <td><input name="title" value="@isset($indexslide){{$indexslide->title}}@endisset" ></td>
            </tr>
            <tr>
                <th class="info">說明:</th>
                <td><textarea name="desp" style="width:100%" rows="5">@isset($indexslide){{$indexslide->desp}}@endisset</textarea></td>
            </tr>
            <tr>
                <th class="info">圖片:</th>
                <td><input name="photo" type="file">@isset($indexslide)<img src="{{asset('uploads/indexslide/'. $indexslide->photo)}}">@endisset</td>
            </tr>

            <tr>
                <th class="info">URL:</th>
                <td><input name="url" value="@isset($indexslide){{$indexslide->url}}@endisset" style="width:100%"></td>
            </tr>
           
            <tr>
                <th class="info">顯示:</th>
                <td><input type="checkbox" name="vw" value="1"  @isset($indexslide){{$indexslide->vw==1?'checked':''}}@endisset ></td>
            </tr>
            <tr>
                <th class="info">排序:</th>
                <td><input name="seq" value="@isset($indexslide){{$indexslide->seq}}@endisset" szie="5"></td>
            </tr>
           
            
            
            <tr>
                <td colspan="2" class="text-center">
                    <a href="/admin/indexslide" class="btn btn-sm btn-light">取消</a>
                    <input type="submit" value="送出" class="btn btn-sm btn-primary">
                </td>
            </tr>
        </table>
    </form>    


</div>
@endsection
