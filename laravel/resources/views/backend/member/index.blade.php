@extends('backend.layouts.master') 
@section('title', '會員管理') 
@section('content')
<div  style="width:100%">
        <div class="row" >
            <div class="col-lg-12">
                <h4>會員管理</h4>
                <div class="well well-sm">
                        <header>
                            <form class="form-inline" action="{{ route('admin.member.index') }}" method="get">
                                <div class="form-group">
                                    <label>姓名: </label>
                                    <input type="text" size="10" name="name" value="{{$req['name']}}" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>帳號: </label>
                                    <input type="text" size="10" name="login_id" value="{{$req['login_id']}}" placeholder="" class="">
                                </div>
                                <div class="form-group">
                                  <label>啟用</label>
                                  <select name="active">
                                        <option value="" >[全部]</option>
                                        <option value="1" {{$req['active']==1?'selected':''}}>是</option>
                                        <option value="2" {{$req['active']==2?'selected':''}}>否</option>
                                  </select>
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
                        <th colspan="10"><a href='{{ route('admin.member.create') }}' class="btn btn-warning btn-sm">新增</a></th>
                    </tr>
                    <tr class="info">
                        <th width="60"></th>
                        <th>帳號</th>
                        <th>姓名</th>
                        <th>暱稱</th>
                        <th>電子信箱</th>
                        <th>手機</th>
                        <th>最後登入時間</th>
                        <th>最後登入來源</th>
                        <th width="60">啟用</th>
                        <th width="250">&nbsp;</th>  
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lists as $obj) 
                        <tr>
                            <th class="align-middle" scope="row">{{$loop->iteration}}</th>
                            <td class="align-middle">{{ $obj->login_id }}</td>
                            <td class="align-middle">{{ $obj->name }}</td>
                            <td class="align-middle">{{ $obj->nick_name }}</td>
                            <td class="align-middle">{{ $obj->email }}</td>
                            <td class="align-middle">{{ $obj->mobile }}</td>
                            <td class="align-middle">{{ $obj->last_login_date }}</td>
                            <td class="align-middle">{{ $obj->last_login_ip }}</td>
                            <td class="align-middle">
                                @if ($obj->active == 1)
                                    <span class='badge badge-success'>Y</span>
                                @else
                                    <span class='badge badge-danger'>N</span>
                                @endif
                            </td>
                            <td class="align-middle">
                                <a href="{{ route('admin.member.edit', $obj->id) }}" class="btn btn-primary btn-sm">修改</a>
                                
                                <a href="{{ route('admin.member.show', $obj->id) }}" class="btn btn-success btn-sm"  >內容</a>

                                <form method="POST" action="{{ route('admin.member.destroy', $obj->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('您確定要刪除嗎??');">刪除</button>
                                </form>

                                <a href="{{ route('admin.member.chgPass', $obj->id) }}" class="btn btn-warning btn-sm"  >變更密碼</a>
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