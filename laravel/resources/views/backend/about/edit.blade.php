@extends('backend.layouts.master') 

@section('title', 'About Edit') 

@section('content')

<div class="container">
    <h3 for="content" class="text-center">關於我們</h3>
    <section class="page-section my-5 p-5">

        <form method="POST" action="{{ route('admin.about.update',  $about->id) }}" enctype="multipart/form-data">

            {{ csrf_field() }}

            {{ method_field('PUT') }}

        <input type="hidden" name="id" value="{{$about->id}}">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2">
                        標題:
                    </div> 
                    <div class="col-md-10 ">
                        <input name="title" value="{{$about->title}}" style="width:100%">    
                    </div>  
                </div>   
                <div class="row">
                        <div class="col-md-2">
                            主題:
                        </div> 
                        <div class="col-md-10 ">
                            <input name="subject" value="{{$about->subject}}" style="width:100%">    
                        </div>  
                </div>   
                <div class="row">
                        <div class="col-md-2">
                            說明:
                        </div> 
                        <div class="col-md-10 ">
                            <textarea name="desp" style="width:100%" rows="5" id="desp">{{$about->desp}}</textarea>    
                        </div>  
                </div>   
                
            </div>

        
           
            
        </form>

    </section>

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
