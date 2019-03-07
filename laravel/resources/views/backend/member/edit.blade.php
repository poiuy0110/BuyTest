@extends('backend.layouts.master') 

@section('title', '會員管理') 

@section('content')

<div class="container">
    <h3 for="content" class="text-center">會員管理</h3>

    @isset($member)
        <form method="POST" action="{{ route('admin.member.update', $member->id) }}" enctype="multipart/form-data">
    @else
        <form method="POST" action="{{ route('admin.member.store') }}" enctype="multipart/form-data">
    @endisset        

            @isset($member)
                {{ method_field("PUT") }}
                <input type="hidden" name="id" value="{{$member->id}}">
            @endisset
            
            {{ csrf_field() }}    

           
            
        <table class="table table-stripped table-bordered">
            
            <tr>
                <th class="info">帳號:</th>
                <td><input name="login_id" value="@isset($member){{$member->login_id}}@endisset" ></td>
                <th class="info">姓名:</th>
                <td><input name="name" value="@isset($member){{$member->name}}@endisset" ></td>
                <th class="info">暱稱:</th>
                <td><input name="nick_name" value="@isset($member){{$member->nick_name}}@endisset" ></td>
            </tr>
            <tr>
                <th class="info">郵遞區號:</th>
                <td><input name="zip_code" value="@isset($member){{$member->zip_code}}@endisset" ></td>
                <th class="info">城市:</th>
                <td><input name="city" value="@isset($member){{$member->city}}@endisset" ></td>
                <th class="info">鄉/鎮:</th>
                <td><input name="town" value="@isset($member){{$member->town}}@endisset" ></td>
            </tr>
            <tr>
                <th class="info">地址:</th>
                <td colspan="5"><input name="address" value="@isset($member){{$member->address}}@endisset" style="width:100%"></td>
            </tr>
            <tr>
                <th class="info">電話:</th>
                <td><input name="tel" value="@isset($member){{$member->tel}}@endisset" ></td>
                <th class="info">手機:</th>
                <td><input name="mobile" value="@isset($member){{$member->mobile}}@endisset" ></td>
                <th class="info">Email</th>
                <td><input name="email" value="@isset($member){{$member->email}}@endisset"  style="width:100%"></td>
            </tr>
            <tr>
                <th class="info">啟用:</th>
                <td colspan="5"><input type="checkbox" name="active" value="1"  @isset($member){{$member->active==1?'checked':''}}@endisset ></td>
            </tr>
            
            <tr>
                <td colspan="6" class="text-center">
                    <a href="/admin/member" class="btn btn-sm btn-light">取消</a>
                    <input type="submit" value="送出" class="btn btn-sm btn-primary">
                </td>
            </tr>
        </table>
    </form>    


</div>
@endsection
