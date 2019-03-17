@extends('backend.layouts.master') 

@section('title', '參數設定') 

@section('content')

<div class="container">
    <h3 for="content" class="text-center">參數設定</h3>

    @isset($params)
        <form method="POST" action="{{ route('admin.params.update') }}" enctype="multipart/form-data">
    @else
        <form method="POST" action="{{ route('admin.params.store') }}" enctype="multipart/form-data">
    @endisset        

            @isset($params)
                {{ method_field("PUT") }}
                
            @endisset
            
            {{ csrf_field() }}    

           
            
        <table class="table table-stripped table-bordered">


            
            <tr>
                <th class="info">編碼:</th>
                <td><input name="id" value="@isset($params){{$params->id}}@endisset" ></td>
            </tr>
            <tr>
                <th class="info">值:</th>
                <td><input name="value" value="@isset($params){{$params->value}}@endisset" style="width:100%"></td>
            </tr>
            <tr>
                <th class="info">描述:</th>
                <td><input name="desp" value="@isset($params){{$params->desp}}@endisset" style="width:100%"></td>
            </tr>
            
           
            <tr>
                <th class="info">編輯:</th>
                <td><input type="checkbox" name="is_edit" value="1"  @isset($params){{$params->is_edit==1?'checked':''}}@endisset ></td>
            </tr>
           
            
            
            <tr>
                <td colspan="2" class="text-center">
                    <a href="/admin/params" class="btn btn-sm btn-light">取消</a>
                    <input type="submit" value="送出" class="btn btn-sm btn-primary">
                </td>
            </tr>
        </table>
    </form>    


</div>
@endsection
