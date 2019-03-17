@extends('backend.layouts.master') 
@section('title', '訂單管理') 
@section('content')
<div  style="width:100%">
        <div class="row" >
            <div class="col-lg-12">
                <h4>訂單管理</h4>
                <div class="well well-sm">
                        <header>
                            <form class="form-inline" action="{{ route('admin.orders.index') }}" method="get" autocomplete="off">
                                <div class="form-group">
                                    <label>訂單編號: </label>
                                    <input type="text" size="10" name="odr_no" value="{{$req['odr_no']}}" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>訂單日期: </label>
                                    <input type="text" size="10" name="s_date" value="{{$req['s_date']}}" placeholder="" class="jdate">  - <input type="text" size="10" name="e_date" value="{{$req['e_date']}}" placeholder="" class="jdate">
                                </div>
                                <div class="form-group">
                                  <label>會員帳號</label>
                                  <input type="text" size="10" name="login_id" value="{{$req['login_id']}}" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>狀態</label>
                                    <select name="status">
                                          <option value="" >[全部]</option>
                                          <option value="0" {{$req['status']==1?'selected':''}}>未結帳</option>
                                          <option value="1" {{$req['status']==2?'selected':''}}>已結帳</option>
                                          <option value="2" {{$req['status']==3?'selected':''}}>未出貨</option>
                                          <option value="4" {{$req['status']==4?'selected':''}}>已出貨</option>
                                          <option value="4" {{$req['status']==5?'selected':''}}>退貨</option>
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
                        <th colspan="16"><a href='{{ route('admin.orders.create') }}' class="btn btn-warning btn-sm">新增</a></th>
                    </tr>
                    <tr class="info">
                        <th width="60"></th>
                        <th width="100">完成狀態</th>
                        <th>訂單編號</th>
                        <th>訂單日期</th>
                        <th>會員編號</th>
                        <th>會員名稱</th>
                        <th>訂購人</th>
                        <th>發票日期</th>
                        <th>發票號碼</th>
                        <th>銷貨金額</th>
                        <th>稅額</th>
                        <th>銷貨總額</th>
                        <th>狀態</th>
                        <th>付款方式</th>
                        <th>配送方式</th>
                        <th width="250">&nbsp;</th>  
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lists as $obj) 
                        <tr>
                            <th class="align-middle" scope="row">{{$loop->iteration}}</th>
                            <td class="align-left">{{ $obj->status_str }}</td>
                            <td class="align-left">{{ $obj->odr_no }}</td>
                            <td class="align-left">{{ $obj->odr_date }}</td>
                            <td class="align-left">{{ $obj->login_id }}</td>
                            <td class="align-left">{{ $obj->mem_name }}</td>
                            <td class="align-left">{{ $obj->bill_to }}</td>
                            <td class="align-left">{{ $obj->inv_date }}</td>
                            <td class="align-left">{{ $obj->inv_no }}</td>
                            <td class="align-right">{{ number_format($obj->amount) }}</td>
                            <td class="align-right">{{ number_format($obj->tax) }}</td>
                            <td class="align-right">{{ number_format($obj->total) }}</td>
                            <td class="align-right">{{ $obj->status_str }}</td>
                            <td class="align-right">{{ $obj->pay_str }}</td>
                            <td class="align-right">{{ $obj->ship_str }}</td>
                            <td class="align-middle">
                                <a href="{{ route('admin.orders.edit', $obj->id) }}" class="btn btn-primary btn-sm">修改</a>
                                
                                <a href="{{ route('admin.orders.show', $obj->id) }}" class="btn btn-success btn-sm"  >內容</a>

                                <form method="POST" action="{{ route('admin.orders.destroy', $obj->id) }}">
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