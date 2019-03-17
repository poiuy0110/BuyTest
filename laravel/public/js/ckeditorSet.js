

$(function(){

$(".ckeditor_set").each(function(){
    id = $(this).attr("name");
   
    setEditor(id);
});

});

function setEditor(editor) {

CKEDITOR.replace( editor,
{
    extraPlugins: 'autogrow,imgbrowse,filebrowser',
    toolbar:
 [
  { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
  { name: 'styles', items : [ 'Font','FontSize' ] },
  { name: 'colors', items : [ 'TextColor','BGColor' ] },
  { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },

  { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
  { name: 'insert', items : [ 'Image','Table','HorizontalRule','SpecialChar'] },


 ],

     height: '600px',
     filebrowserUploadUrl:'/admin/ckeditorFileUpload',
     filebrowserImageUploadUrl:'/admin/ckeditorFileUpload',
     removeDialogTabs: 'image:advanced;link:advanced',
     language:'zh',
});

}

/*<script>
       
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
</script>*/