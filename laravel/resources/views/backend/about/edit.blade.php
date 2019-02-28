@extends('backend.layouts.master') 

@section('title', 'About Edit') 

@section('content')

<div class="container">
    <h3 for="content" class="text-center">關於我們</h3>

    <form method="POST" action="{{ route('admin.about.update',  $about->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            {{ method_field('PUT') }}

            <input type="hidden" name="id" value="{{$about->id}}">
            
        <table class="table table-stripped table-bordered">
            
            <tr>
                <th class="info">發布時間:</th>
                <td><input name="post_date" value="{{$about->post_date}}" class="jdate"></td>
            </tr>
            <tr>
                <th class="info">標題:</th>
                <td><input name="title" value="{{$about->title}}" style="width:100%"></td>
            </tr>
            <tr>
                <th class="info">主題:</th>
                <td><input name="subject" value="{{$about->subject}}" style="width:100%"></td>
            </tr>
            <tr>
                <th class="info">說明:</th>
                <td><textarea name="desp" style="width:100%" rows="5" id="desp">{{$about->desp}}</textarea> </td>
            </tr>
            <tr>
                <th class="info">顯示:</th>
                <td><input type="checkbox" name="vw" value="1" {{$about->vw==1?'checked':''}}></td>
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

<script>
       
			CKEDITOR.replace( 'desp',
            {
                extraPlugins: 'autogrow,imgbrowse,filebrowser',
               toolbar:
            [
             { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
			 { name: 'styles', items : [ 'Font','FontSize' ] },
			 { name: 'colors', items : [ 'TextColor','BGColor' ] },
			 { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
			 '/',
			 { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
			 { name: 'insert', items : [ 'Image','Table','HorizontalRule','SpecialChar'] },
           

            ],
   
                height: '600px',
                filebrowserUploadUrl:'/admin/ckeditorFileUpload',
                filebrowserImageUploadUrl:'/admin/ckeditorFileUpload',
                removeDialogTabs: 'image:advanced;link:advanced',
                language:'zh',
                
                
                
               
            });
</script>
@endsection
