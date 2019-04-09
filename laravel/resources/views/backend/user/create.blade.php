@extends('backend.layouts.master') 

@section('title', '使用者管理') 

@section('content')

<div class="container">
    <h3 for="content" class="text-center">使用者管理</h3>

        <form method="POST" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">   
            
            {{ csrf_field() }}    

           
            
        <table class="table table-stripped table-bordered">
            
            <tr>
                <th class="info">使用者帳號:</th>
                <td><input name="user_id"></td>
                <th class="info">使用者職稱:</th>
                <td><input name="title" ></td>
            </tr>
            <tr>
                <th class="info">密碼:</th>
                <td><input name="password" type="password"></td>
                <th class="info">確認密碼:</th>
                <td><input name="password_confirmation" value="" type="password" ></td>
            </tr>

            <tr>
                <th class="info">使用者Email</th>
                <td><input name="email" value="@isset($user){{$user->email}}@endisset"></td>
                <th class="info">啟用</th>
                <td><input type="checkbox" name="active" value="1"  @isset($user){{$user->active==1?'checked':''}}@endisset ></td>
            </tr>
            
            <tr>
                <td colspan="6" class="text-center">
                    <a href="/admin/user" class="btn btn-sm btn-light">取消</a>
                    <input type="submit" value="送出" class="btn btn-sm btn-primary">
                </td>
            </tr>
        </table>
    </form>    


</div>
@endsection
