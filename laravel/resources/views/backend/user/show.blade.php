@extends('backend.layouts.master') 

@section('title', '使用者管理') 

@section('content')

<div class="container">
    <h3 for="content" class="text-center">使用者管理</h3>

    <table class="table table-stripped table-bordered">

        <tr>
            <th class="info">使用者帳號:</th>
            <td>{{$user->user_id}}</td>
            <th class="info">使用者職稱:</th>
            <td>{{$user->title}}</td>
        </tr>
      
        <tr>
            <th class="info">使用者Email:</th>
            <td>{{$user->email}}</td>
            <th class="info">啟用</th>
            <td>
                @if ($user->active == 1)
                        <span class='badge badge-success'>Y</span>
                    @else
                        <span class='badge badge-danger'>N</span>
                @endif
            </td>
        </tr>
        
        <tr>
            <td colspan="6" class="text-center">
                <a href="/admin/user" class="btn btn-sm btn-light">取消</a>
                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-primary">修改</a>
            </td>
        </tr>
    </table>


</div>

@endsection