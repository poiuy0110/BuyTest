@extends('backend.layouts.master') 
@section('title', '關於我們') 
@section('content')
<div class="container" style="width:100%">
        <div class="row" >
            <div class="col-lg-12">
                <h4>關於我們</h4>
                <div class="well well-sm">
                        <header>
                            <form class="form-inline" action="{{ route('admin.about.index') }}" method="get">
                                <div class="form-group">
                                    <label>標題: </label>
                                    <input type="text" size="10" name="title" value="{{$req['title']}}" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>內文: </label>
                                    <input type="text" size="10" name="desp" value="{{$req['desp']}}" placeholder="" class="">
                                    
                                </div>
                                
                                <div class="form-group">
                                  <label>顯示</label>
                                  <select name="status  ">
                                        <option value="" >[全部]</option>
                                        <option value="1" {{$req['status']==1?'selected':''}}>顯示</option>
                                        <option value="0 "{{$req['status']==0?'selected':''}}>未顯示</option>

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
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">類別</th>
                        <th scope="col">標題</th>
                        <th scope="col">發布時間</th>
                        <th scope="col">顯示</th>
                        <th scope="col">&nbsp;</th>
                        <th scope="col">&nbsp;</th>
                        <th scope="col">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($lists as $obj) 
                        <tr>
                            <th class="align-middle" scope="row">{{ $obj->id }}</th>
                            <td class="align-middle">{{ $obj->kind }}</td>
                            <td class="align-middle">{{ $obj->title }}</td>
                            <td class="align-middle">{{ $obj->post_date }}</td>
                            <td class="align-middle">{{ $obj->vw }}</td>
                            <td class="align-middle">
                                <a href="{{ route('admin.about.edit', $obj->id) }}" class="btn btn-primary">修改</a>
                                <form method="POST" action="{{ route('admin.about.destroy', $obj->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-secondary">刪除</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No Product</td>
                        </tr>
                    @endforelse
                    
                </tbody>
            </table>
            <div class="text-center">
                {!! $lists->render() !!}
            </div>    
        </div>
       
        </div>
        
</div>

@endsection