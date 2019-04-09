@extends('backend.layouts.master') 

@section('title', '商家管理') 

@section('content')

<div class="container">
    <h3 for="content" class="text-center">商家管理</h3>

    <table class="table table-stripped table-bordered">
            
        <tr>
            <th class="info">商家代碼:</th>
            <td>{{$store->store_code}}</td>
            <th class="info">商家名稱:</th>
            <td>{{$store->name}}</td>
        </tr>
        <tr>
            <th class="info">城市:</th>
            <td>{{$store->city}}</td>
            <th class="info">鄉/鎮:</th>
            <td>{{$store->town}}</td>
        </tr>
        <tr>
            <th class="info">地址:</th>
            <td colspan="3">{{$store->address}}</td>
        </tr>
        <tr>
            <th class="info">電話:</th>
            <td>{{$store->tel}}</td>
            <th class="info">傳真:</th>
            <td>{{$store->fax}}</td>
        </tr>
        <tr>
            <th class="info">聯絡人</th>
            <td>{{$store->contact}}</td>
            <th class="info">Email</th>
            <td>{{$store->email}}</td>
        </tr>
        <tr>
            <th class="info">統一編號</th>
            <td>{{$store->bin}}</td>
            <th class="info">啟用</th>
            <td>
                @if ($store->active == 1)
                        <span class='badge badge-success'>Y</span>
                    @else
                        <span class='badge badge-danger'>N</span>
                @endif
            </td>
        </tr>
        
        <tr>
            <td colspan="6" class="text-center">
                <a href="/admin/store" class="btn btn-sm btn-light">取消</a>
                <a href="{{ route('admin.store.edit', $store->id) }}" class="btn btn-sm btn-primary">修改</a>
            </td>
        </tr>
    </table>


</div>

@endsection