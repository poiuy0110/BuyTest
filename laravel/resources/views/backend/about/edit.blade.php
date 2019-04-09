@extends('backend.layouts.master') 

@section('title', 'About Edit') 

@section('content')

<div class="container">
    <h3 for="content" class="text-center">關於我們</h3>

    @isset($about)
        <form method="POST" action="{{ route('admin.about.update', $about->id) }}" enctype="multipart/form-data">
    @else
        <form method="POST" action="{{ route('admin.about.store') }}" enctype="multipart/form-data">
    @endisset        

            @isset($about)
                {{ method_field("PUT") }}
                <input type="hidden" name="id" value="{{$about->id}}">
            @endisset
            
            {{ csrf_field() }}    

           
            
        <table class="table table-stripped table-bordered">
            
            <tr>
                <th class="info">發布時間:</th>
                <td><input name="post_date" value="@isset($about){{$about->post_date}}@endisset" class="jdate"></td>
            </tr>
            <tr>
                <th class="info">標題:</th>
                <td><input name="title" value="@isset($about){{$about->title}}@endisset" style="width:100%"></td>
            </tr>
            <tr>
                <th class="info">主題:</th>
                <td><input name="subject" value="@isset($about){{$about->subject}}@endisset" style="width:100%"></td>
            </tr>
            <tr>
                <th class="info">說明:</th>
                <td><textarea name="desp" class="ckeditor_set" style="width:100%" rows="5" id="desp">@isset($about){{$about->desp}}@endisset</textarea> </td>
            </tr>
            <tr>
                <th class="info">顯示:</th>
                <td><input type="checkbox" name="vw" value="1" @isset($about){{$about->vw==1?'checked':''}}@endisset></td>
            </tr>
            <tr>
                <th class="info">預設:</th>
                <td><input type="checkbox" name="def" value="1" @isset($about){{$about->def==1?'checked':''}}@endisset></td>
            </tr>
            
            <tr>
                <td colspan="2" class="text-center">
                    <a href="/admin/about" class="btn btn-sm btn-light">取消</a>
                    <input type="submit" value="送出" class="btn btn-sm btn-primary">
                </td>
            </tr>
        </table>
    </form>    


</div>


@endsection
