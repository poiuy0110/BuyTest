@extends('backend.layouts.master') 

@section('title', '商家管理') 

@section('content')

<div class="container">
    <h3 for="content" class="text-center">商家管理</h3>

    @isset($store)
        <form method="POST" action="{{ route('admin.store.update', $store->id) }}" enctype="multipart/form-data">
    @else
        <form method="POST" action="{{ route('admin.store.store') }}" enctype="multipart/form-data">
    @endisset        

            @isset($store)
                {{ method_field("PUT") }}
                <input type="hidden" name="id" value="{{$store->id}}">
            @endisset
            
            {{ csrf_field() }}    

           
            
        <table class="table table-stripped table-bordered">
            
            <tr>
                <th class="info">商家代碼:</th>
                <td><input name="store_code" value="@isset($store){{$store->store_code}}@endisset" ></td>
                <th class="info">商家名稱:</th>
                <td><input name="name" value="@isset($store){{$store->name}}@endisset" ></td>
            </tr>
            <tr>
                <th class="info">城市:</th>
                <td><input name="city" value="@isset($store){{$store->city}}@endisset" ></td>
                <th class="info">鄉/鎮:</th>
                <td><input name="town" value="@isset($store){{$store->town}}@endisset" ></td>
            </tr>
            <tr>
                <th class="info">地址:</th>
                <td colspan="3"><input name="address" value="@isset($store){{$store->address}}@endisset" style="width:100%"></td>
            </tr>
            <tr>
                <th class="info">電話:</th>
                <td><input name="tel" value="@isset($store){{$store->tel}}@endisset" ></td>
                <th class="info">傳真:</th>
                <td><input name="fax" value="@isset($store){{$store->fax}}@endisset" ></td>
            </tr>
            <tr>
                <th class="info">聯絡人</th>
                <td><input name="contact" value="@isset($store){{$store->contact}}@endisset"></td>
                <th class="info">Email</th>
                <td><input name="email" value="@isset($store){{$store->email}}@endisset"  style="width:100%"></td>
            </tr>
            <tr>
                <th class="info">統一編號</th>
                <td><input name="bin" value="@isset($store){{$store->bin}}@endisset"></td>
                <th class="info">啟用</th>
                <td><input type="checkbox" name="active" value="1"  @isset($store){{$store->active==1?'checked':''}}@endisset ></td>
            </tr>
            
            <tr>
                <td colspan="6" class="text-center">
                    <a href="/admin/store" class="btn btn-sm btn-light">取消</a>
                    <input type="submit" value="送出" class="btn btn-sm btn-primary">
                </td>
            </tr>
        </table>
    </form>    


</div>
@endsection
