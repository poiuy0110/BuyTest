@extends('backend.layouts.master') 
@section('title', '參數設定') 
@section('content')
<div  style="width:100%">
        <div class="row" >
            <div class="col-lg-12">
                <h4>參數設定</h4>
                <div class="well well-sm">
                        <header>
                            <form class="form-inline" action="{{ route('admin.params.index') }}" method="get">
                                <div class="form-group">
                                    <label>編碼: </label>
                                    <input type="text" size="10" name="id" value="{{$req['id']}}" placeholder="">
                                </div>
                                <div class="form-group">
                                  <label>編輯</label>
                                  <select name="is_edit">
                                        <option value="" >[全部]</option>
                                        <option value="1" {{$req['is_edit']==1?'selected':''}}>可</option>
                                        <option value="2" {{$req['is_edit']==2?'selected':''}}>不可</option>
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
                        <th colspan="10"><a href='{{ route('admin.params.create') }}' class="btn btn-warning btn-sm">新增</a></th>
                    </tr>
                    <tr class="info">
                        <th width="60"></th>
                        <th  width="200">編碼</th>
                        <th>值</th>
                        <th>描述</th>
                        <th width="250">&nbsp;</th>  
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lists as $obj) 
                        <tr>
                            <th class="align-middle" scope="row">{{$loop->iteration}}</th>
                            <td class="align-middle">{{ $obj->id }}</td>
                            <td class="align-middle">{{ $obj->value }}</td>
                            <td class="align-middle">{{ $obj->desp }}</td>
                            <td class="align-middle">
                                @if ($obj->is_edit == 1) <a href="{{ route('admin.params.edit', $obj->id) }}" class="btn btn-primary btn-sm">修改</a>@endif

                                <form method="POST" action="{{ route('admin.params.destroy', $obj->id) }}">
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