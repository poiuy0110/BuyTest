@extends('backend.layouts.master') 
@section('title', '使用者管理') 
@section('content')
<div  style="width:100%">
        <div class="row" >
            <div class="col-lg-12">
                <h4>使用者管理</h4>
                <div class="well well-sm">
                        <header>
                            <form class="form-inline" action="{{ route('admin.user.index') }}" method="get">
                                <div class="form-group">
                                    <label>使用者帳號: </label>
                                    <input type="text" size="10" name="user_id" value="{{$req['user_id']}}" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>使用者職稱: </label>
                                    <input type="text" size="10" name="title" value="{{$req['title']}}" placeholder="" class="">
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
                        <th colspan="10"><a href='{{ route('admin.user.create') }}' class="btn btn-warning btn-sm">新增</a></th>
                    </tr>
                    <tr class="info">
                        <th width="60"></th>
                        <th>使用者帳號</th>
                        <th>職稱</th>
                        <th>E-mail</th>
                        <th>啟用</th>
                        <th width="250">&nbsp;</th>  
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lists as $obj) 
                        <tr>
                            <th class="align-middle" scope="row">{{$loop->iteration}}</th>
                            <td class="align-middle">{{ $obj->login_id }}</td>
                            <td class="align-middle">{{ $obj->title }}</td>
                            <td class="align-middle">{{ $obj->email }}</td>
                            <td class="align-middle">
                                @if ($obj->active == 1)
                                    <span class='badge badge-success'>Y</span>
                                @else
                                    <span class='badge badge-danger'>N</span>
                                @endif
                            </td>
                            <td class="align-middle">
                                <a href="{{ route('admin.user.edit', $obj->id) }}" class="btn btn-primary btn-sm">修改</a>
                                
                                <a href="{{ route('admin.user.show', $obj->id) }}" class="btn btn-success btn-sm"  >內容</a>

                                <form method="POST" action="{{ route('admin.user.destroy', $obj->id) }}">
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