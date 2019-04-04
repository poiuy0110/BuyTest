@extends('frontend.layouts.master')
@section('title', 'Buy Test ')
@section('nav_home', 'active')


@section('content')

   <section>
        <div class="row div_paddind_15" style="margin-top:20px">
            <h1 style="color:#888888">訂單明細</h1>
            <table class="table table-responsive w-100 d-block d-md-table">
                <tr style="background-color:#f2dede">
                    <th colspan="2">商品</th>
                    <th>售價</th>
                    <th>訂購數量</th>
                    <th>金額</th>
                </tr>
                @foreach ($lists as $obj)
                <tr>
                    <input name="ids[]" value="{{$obj->id}}" type="hidden">
                    <td  width="100"><img src="{{asset('uploads/product/'. $obj->oProduct->photo)}}" width="100"></td>
                    <td>{{$obj->oProduct->name}}</td>
                    <td>{{$obj->oProduct->price}}</td>
                    <td>{{$obj->qty}}</td>
                    <td>{{$obj->amount}}</td>
                </tr>
                @endforeach   
            </table>
            <div class="row col-md-12">
                <div class="col-md-8" style="text-align:left">
                    <div class="card">
                        <div class="card-body bg-light">
                            <h4>訂購資料</h4>
                            @if($errors->all())
                                <div class="alert-sm alert-danger" role="alert">
                                     @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                            @endif
                            <table class="table table-responsive w-100 d-block d-md-table">
                                <tr><td width="120">姓名：</td>
                                    <td>
                                        {{$orders->bill_ename}}
                                    </td>
                                    <td width="120">電話：</td>
                                    <td>
                                        {{$orders->bill_emobile}}
                                    </td>
                                </tr>
                                <tr>
                                    <td >地址：</td><td colspan=3>
                                        {{$orders->bill_city}} {{$orders->bill_town}} {{$orders->bill_zipcode}} {{$orders->bill_address}}
                                    </td>
                                </tr>
                                <tr>		
                                    <td width="120"> Email：</td><td colspan=3>
                                        {{$orders->bill_email}}
                                    </td>	
                                </tr>
                                
                                
                                </table>
                               
                                <h4>送貨資料 </h4>
                                <table class="table table-responsive w-100 d-block d-md-table">
                                <tr>
                                    <td width="120">送貨方式</td>
                                    <td colspan="3">
                                        {{$orders->ship_str}}
                                    </td>	
                                </tr>		
                                <tr class="ship_addr_show"><td>收貨人：</td><td>{{$orders->ship_to}}</td>
                                    <td width="120">聯絡電話：</td><td>{{$orders->ship_mobile}}</td>
                                </tr>
                                <tr class="ship_addr_show">
                                    <td width="120"> 送貨地址：</td><td colspan=3>
                                        {{$orders->ship_city}} {{$orders->ship_town}} {{$orders->ship_zipcode}} {{$orders->ship_address}}    
                                    </td>
                                </tr>
                                <tr>		
                                    <td width="120">附註：</td><td colspan=3>
                                        {{$orders->remark}}
                                    </td>	
                                </tr>
                                
                            </table>
                                
                            <h4>發票資料</h4>
                            <table class="table table-responsive w-100 d-block d-md-table">
                                <tr>
                                    <td width="120" >開立聯數：</td>
                                    <td>
                                        {{$orders->inv_type}}
                                    </td>
                                </tr>
                                <tr>
                                <td width="120">發票統編：</td>
                                <td colspan=3>
                                    {{$orders->inv_bin}}
                                </td>
                                </tr>
                                <tr>
                                    <td width="120">發票抬頭：</td>
                                    <td colspan=3>
                                        {{$orders->inv_title}}
                                    </td>
                                </tr>
                                
                            </table>    
                        </div>
                    </div>
                </div>  
                <div class="col-md-4" style="text-align:left">
                    <div class="card">
                        <div class="card-body bg-light">
                                <table class="table table-responsive w-100 d-block d-md-table">
                                        <tr><td style="border-top: none !important;">小計金額</td><td  class="text-right" style="border-top: none !important;"><span id="amt_show">{{$orders->amount}}</td></tr>
                                        <tr><td>運費</td><td  class="text-right">{{$orders->shipping}}</td></tr>
                                        <tr><td>合計總額</td><td  class="text-right"><h3>{{$orders->total}}元</h3></td></tr>	
                                        </table>
                                        <table class="table  text-left">
                                        <tr><td><h4 class="text-left">付款方式：</h4></td></tr>
                                        <tr>
                                            <td>
                                                {{$orders->pay_str}}
                                            </td>
                                        </tr>
                                                        
                                        <tr><td  class="text-right"></td></tr>
                                    </table>
                        </div>
                    </div>
                </div>  
                
            </div>    
        </div>

        
  </section>
@endsection
