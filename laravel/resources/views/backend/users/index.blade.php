@extends('backend.layouts.master') 
@section('title', '商家管理') 
@section('content')
<div  style="width:100%">
        <div class="row" >
            <div class="col-lg-12">
                <h4>商家管理</h4>
                <div class="well well-sm">
                        <header>
                            <form class="form-inline" action="{{ route('admin.store.index') }}" method="get">
                                <div class="form-group">
                                    <label>名稱: </label>
                                    <input type="text" size="10" name="name" value="{{$req['name']}}" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>代碼: </label>
                                    <input type="text" size="10" name="store_code" value="{{$req['store_code']}}" placeholder="" class="">
                                </div>
                                 <button type="submit" class="btn btn-primary btn-sm">查詢</button>
                                </form>
                            
                            <div class="toolbar">
                                <ul class="nav  navbar-right">
                                    
                                </ul>
                            </div>

                        </header>
                    </div>  
                
            <div class="body">
            <table class="table table-bordered table-striped  table-hover " >
                <thead>
                    <tr>
                        <th colspan="10"><a href='{{ route('admin.store.create') }}' class="btn btn-warning btn-sm">新增</a></th>
                    </tr>
                    <tr class="info">
                        <th width="60"></th>
                        <th>商家代碼</th>
                        <th>商家名稱</th>
                        <th>縣市</th>
                        <th>鄉鎮市區</th>
                        <th>電話</th>
                        <th>傳真</th>
                        <th>E-mail</th>
                        <th>啟用</th>
                        <th width="250">&nbsp;</th>  
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lists as $obj) 
                        <tr>
                            <th class="align-middle" scope="row">{{$loop->iteration}}</th>
                            <td class="align-middle">{{ $obj->store_code }}</td>
                            <td class="align-middle">{{ $obj->name }}</td>
                            <td class="align-middle">{{ $obj->city }}</td>
                            <td class="align-middle">{{ $obj->town }}</td>
                            <td class="align-middle">{{ $obj->tel }}</td>
                            <td class="align-middle">{{ $obj->fax }}</td>
                            <td class="align-middle">{{ $obj->email }}</td>
                            <td class="align-middle">
                                @if ($obj->active == 1)
                                    <span class='badge badge-success'>Y</span>
                                @else
                                    <span class='badge badge-danger'>N</span>
                                @endif
                            </td>
                            <td class="align-middle">
                                <a href="{{ route('admin.store.edit', $obj->id) }}" class="btn btn-primary btn-sm">修改</a>
                                
                                <a href="{{ route('admin.store.show', $obj->id) }}" class="btn btn-success btn-sm"  >內容</a>

                                <form method="POST" action="{{ route('admin.store.destroy', $obj->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('您確定要刪除嗎??');">刪除</button>
                                </form>
                            </td>  
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            <div class="text-center">
                    {!! $lists->render() !!}
            </div>  
        </div>
             
    </div>
       
        </div>
        
</div>

@endsection