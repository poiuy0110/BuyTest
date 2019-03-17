@extends('backend.layouts.master') 
@section('title', '首頁輪播圖') 
@section('content')
<div  style="width:100%">
        <div class="row" >
            <div class="col-lg-12">
                <h4>首頁輪播圖</h4>
                <div class="well well-sm">
                        <header>
                            <form class="form-inline" action="{{ route('admin.indexslide.index') }}" method="get">
                                <div class="form-group">
                                    <label>標題: </label>
                                    <input type="text" size="10" name="title" value="{{$req['title']}}" placeholder="">
                                </div>
                                <div class="form-group">
                                  <label>顯示</label>
                                  <select name="vw">
                                        <option value="" >[全部]</option>
                                        <option value="1" {{$req['vw']==1?'selected':''}}>是</option>
                                        <option value="2" {{$req['vw']==2?'selected':''}}>否</option>
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
                        <th colspan="10"><a href='{{ route('admin.indexslide.create') }}' class="btn btn-warning btn-sm">新增</a></th>
                    </tr>
                    <tr class="info">
                        <th width="60"></th>
                        <th  width="200">標題</th>
                        <th>圖片</th>
                        <th width="60">顯示</th>
                        <th width="60">排序</th>
                        <th width="250">&nbsp;</th>  
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lists as $obj) 
                        <tr>
                            <th class="align-middle" scope="row">{{$loop->iteration}}</th>
                            <td class="align-middle">{{ $obj->title }}</td>
                            <td class="align-middle">@isset($obj->photo)<img src="{{asset('uploads/indexslide/'. $obj->photo)}}">@endisset</td>
                            <td class="align-middle">
                                @if ($obj->vw == 1)
                                    <span class='badge badge-success'>Y</span>
                                @else
                                    <span class='badge badge-danger'>N</span>
                                @endif
                            </td>
                            <td class="align-middle">
                                {{ $obj->seq }}
                            </td>
                            <td class="align-middle">
                                <a href="{{ route('admin.indexslide.edit', $obj->id) }}" class="btn btn-primary btn-sm">修改</a>
                                
                                <a href="{{ route('admin.indexslide.show', ['id'=>$obj->id]) }}" class="btn btn-success btn-sm"  >內容</a>

                                <form method="POST" action="{{ route('admin.indexslide.destroy', $obj->id) }}">
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