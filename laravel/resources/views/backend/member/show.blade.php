@extends('backend.layouts.master') 

@section('title', '會員管理') 

@section('content')

<div class="container">
    <h3 for="content" class="text-center">會員管理</h3>

    <table class="table table-stripped table-bordered">
            
        <tr>
            <th class="info" width="120">帳號:</th>
            <td>{{$member->login_id}}</td>
            <th class="info" width="120">姓名:</th>
            <td>{{$member->name}}</td>
            <th class="info" width="120">暱稱:</th>
            <td>{{$member->nick_name}}</td>
        </tr>
        <tr>
            <th class="info">郵遞區號:</th>
            <td>{{$member->zip_code}}</td>
            <th class="info">城市:</th>
            <td>{{$member->city}}</td>
            <th class="info">鄉/鎮:</th>
            <td>{{$member->town}}</td>
        </tr>
        <tr>
            <th class="info">地址:</th>
            <td colspan="5">{{$member->address}}</td>
        </tr>
        <tr>
            <th class="info">電話:</th>
            <td>{{$member->tel}}</td>
            <th class="info">手機:</th>
            <td>{{$member->mobile}}</td>
            <th class="info">Email</th>
            <td>{{$member->email}}</td>
        </tr>
        <tr>
            <th class="info">啟用:</th>
            <td colspan="5">
                @if ($member->active == 1)
                    <span class='badge badge-success'>Y</span>
                @else
                     <span class='badge badge-danger'>N</span>
                @endif
            </td>
        </tr>
        
        <tr>
            <td colspan="6" class="text-center">
                <a href="/admin/member" class="btn btn-sm btn-light">取消</a>
                <a href="{{ route('admin.member.edit', $member->id) }}" class="btn btn-sm btn-primary">修改</a>
            </td>
        </tr>
    </table>


</div>

@endsection