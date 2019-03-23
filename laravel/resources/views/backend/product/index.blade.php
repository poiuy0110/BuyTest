@extends('backend.layouts.master') 
@section('title', '商品設定') 
@section('content')
<div  style="width:100%">
        <div class="row" >
            <div class="col-lg-12">
                <h4>商品設定</h4>
                <div class="well well-sm">
                        <header>
                            <form class="form-inline" action="{{ route('admin.product.index') }}" method="get">
                                <div class="form-group">
                                    <label>名稱: </label>
                                    <input type="text" size="10" name="name" value="{{$req['name']}}" placeholder="">
                                </div>
                                <div class="form-group">
                                  <label>顯示</label>
                                  <select name="vw">
                                        <option value="" >[全部]</option>
                                        <option value="1" {{$req['vw']==1?'selected':''}}>是</option>
                                        <option value="2" {{$req['vw']==2?'selected':''}}>否</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                    <label>熱門</label>
                                    <select name="hot">
                                          <option value="" >[全部]</option>
                                          <option value="1" {{$req['hot']==1?'selected':''}}>是</option>
                                          <option value="2" {{$req['hot']==2?'selected':''}}>否</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label>最新</label>
                                    <select name="new">
                                          <option value="" >[全部]</option>
                                          <option value="1" {{$req['new']==1?'selected':''}}>是</option>
                                          <option value="2" {{$req['new']==2?'selected':''}}>否</option>
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
                        <th colspan="11"><a href='{{ route('admin.product.create') }}' class="btn btn-warning btn-sm">新增</a></th>
                    </tr>
                    <tr class="info">
                        <th width="60"></th>
                        <th  width="200">所屬商家</th>
                        <th  width="200">類別</th>
                        <th  width="200">名稱</th>
                        <th>圖片</th>
                        <th width="100">庫存數</th>
                        <th width="100">單價</th>
                        <th width="60">顯示</th>
                        <th width="60">熱門</th>
                        <th width="60">最新</th>
                        <th width="250">&nbsp;</th>  
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lists as $obj) 
                        <tr>
                            <th class="align-middle" scope="row">{{$loop->iteration}}</th>
                            <td class="align-middle">@isset($obj->store){{ $obj->store->name }}@endisset</td>
                            <td class="align-middle">{{ $obj->category->name }}</td>
                            <td class="align-middle">{{ $obj->name }}</td>
                            <td class="align-middle">@isset($obj->photo)<img src="{{asset('uploads/product/'. $obj->photo)}}">@endisset</td>
                            <td class="align-right">{{ number_format($obj->qty) }}</td>
                            <td class="align-right">{{ number_format($obj->price) }}</td>
                            <td class="align-middle">
                                @if ($obj->vw == 1)
                                    <span class='badge badge-success'>Y</span>
                                @else
                                    <span class='badge badge-danger'>N</span>
                                @endif
                            </td>
                            <td class="align-middle">
                                @if ($obj->hot == 1)
                                    <span class='badge badge-success'>Y</span>
                                @else
                                    <span class='badge badge-danger'>N</span>
                                @endif
                            </td>
                            <td class="align-middle">
                                @if ($obj->new == 1)
                                    <span class='badge badge-success'>Y</span>
                                @else
                                    <span class='badge badge-danger'>N</span>
                                @endif
                            </td>
                            <td class="align-middle">
                                <a href="{{ route('admin.product.edit', $obj->id) }}" class="btn btn-primary btn-sm">修改</a>
                                
                                <a href="{{ route('admin.product.show', ['id'=>$obj->id]) }}" class="btn btn-success btn-sm"  >內容</a>

                                <form method="POST" action="{{ route('admin.product.destroy', $obj->id) }}">
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