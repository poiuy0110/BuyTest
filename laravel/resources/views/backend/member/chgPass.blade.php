@extends('backend.layouts.master') 

@section('title', '會員管理') 

@section('content')

<div class="container">
    <h3 for="content" class="text-center">會員管理</h3>
        <form method="POST" action="{{ route('admin.member.chgPassSave') }}" enctype="multipart/form-data">
        
        @if($errors->first())
            <div class="alert alert-danger display-hide" style="display: block;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach     
            </div>
        @endif
        
        
        {{ csrf_field() }}   

        <input type="hidden" name="id" value="@isset($member){{$member->id}}@endisset">

           
            
        <table class="table table-stripped table-bordered">
            
            <tr>
                <th class="info" width="120">帳號:</th>
                <td>@isset($member){{$member->login_id}}@endisset</td>
                <th class="info" width="120">姓名:</th>
                <td>@isset($member){{$member->name}}@endisset</td>
            </tr>
            <tr>
                <th class="info">舊密碼:</th>
                <td colspan="3"><input name="old_pass" value="" type="password"></td>
            </tr>
            <tr>
                <th class="info">新密碼:</th>
                <td colspan="3"><input name="password" value="" type="password"></td>
            </tr>
            <tr>
                <th class="info">確認新密碼:</th>
                <td colspan="3"><input name="password_confirmation" value="" type="password"></td>
            </tr>
            <tr>
                <td colspan="4" class="text-center">
                    <a href="/admin/member" class="btn btn-sm btn-light">取消</a>
                    <input type="submit" value="送出" class="btn btn-sm btn-primary">
                </td>
            </tr>
        </table>
    </form>    


</div>
@endsection
