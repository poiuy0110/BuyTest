@extends('backend.layouts.master') 

@section('title', '類別設定') 

@section('content')

<div class="container">
    <h3 for="content" class="text-center">類別設定</h3>

    @isset($category)
        <form method="POST" action="{{ route('admin.category.update', $category->id) }}" enctype="multipart/form-data">
    @else
        <form method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
    @endisset        

            @isset($category)
                {{ method_field("PUT") }}
                <input type="hidden" name="id" value="{{$category->id}}">
            @endisset
            
            {{ csrf_field() }}    

           
            
        <table class="table table-stripped table-bordered">
            
            <tr>
                <th class="info">名稱:</th>
                <td><input name="name" value="@isset($category){{$category->name}}@endisset" ></td>
            </tr>
            <tr>
                <th class="info">說明:</th>
                <td><textarea name="desp" style="width:100%" rows="3">@isset($category){{$category->desp}}@endisset</textarea></td>
            </tr>
            <tr>
                <th class="info">圖片:</th>
                <td><input name="photo" type="file">@isset($category)<img src="{{asset('uploads/category/'. $category->photo)}}">@endisset</td>
            </tr>
            <tr>
                <th class="info">顯示:</th>
                <td><input type="checkbox" name="vw" value="1"  @isset($category){{$category->vw==1?'checked':''}}@endisset ></td>
            </tr>
            <tr>
                <th class="info">熱門:</th>
                <td><input type="checkbox" name="hot" value="1"  @isset($category){{$category->hot==1?'checked':''}}@endisset ></td>
            </tr>
            <tr>
                <th class="info">排序:</th>
                <td><input name="seq" value="@isset($category){{$category->seq}}@endisset" size="10"></td>
            </tr>
            
            <tr>
                <td colspan="2" class="text-center">
                    <a href="/admin/category" class="btn btn-sm btn-light">取消</a>
                    <input type="submit" value="送出" class="btn btn-sm btn-primary">
                </td>
            </tr>
        </table>
    </form>    


</div>
@endsection
