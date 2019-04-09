@extends('backend.layouts.master') 

@section('title', '使用者管理') 

@section('content')

<div class="container">
    <h3 for="content" class="text-center">使用者管理</h3>

        <form method="POST" action="{{ route('admin.user.chgPassSave') }}" enctype="multipart/form-data">   
            
            {{ csrf_field() }}    
            <input type="hidden" name="id" value="{{$user->id}}">

           
            
        <table class="table table-stripped table-bordered">

            <tr>
                <th class="info">舊密碼:</th>
                <td><input name="old_pass" type="old_pass"></td>
                @if($errors->has('old_pass'))
                    <div class="alert-sm alert-danger" role="alert">
                        {{$errors->first('old_pass')}}
                    </div>
                @endif
            </tr>
            
            <tr>
                <th class="info">密碼:</th>
                <td><input name="password" type="password"></td>
                @if($errors->has('password'))
                    <div class="alert-sm alert-danger" role="alert">
                        {{$errors->first('password')}}
                    </div>
                @endif
            </tr>
            <tr>
                <th class="info">確認密碼:</th>
                <td><input name="password_confirmation" value="" type="password" ></td>
            </tr>
          
            <tr>
                <td class="text-center" colspan="2">
                    <a href="/admin/user" class="btn btn-sm btn-light">取消</a>
                    <input type="submit" value="送出" class="btn btn-sm btn-primary">
                </td>
            </tr>
        </table>
    </form>    


</div>
@endsection
