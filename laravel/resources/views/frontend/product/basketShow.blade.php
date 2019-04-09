@extends('frontend.layouts.master')
@push('head')
<script src="{{ asset('js/basket.js') }}"></script>
@endpush
@section('title', 'Buy Test ')
@section('nav_home', 'active')


@section('content')

   <section>
        <div class="row div_paddind_15" style="margin-top:20px">
            <h1 style="color:#888888">購物車</h1>
            <table class="table table-responsive w-100 d-block d-md-table">
                <tr style="background-color:#f2dede">
                    <th colspan="2">商品</th>
                    <th>售價</th>
                    <th>訂購數量</th>
                    <th>金額</th>
                    <th>&nbsp;</th>
                </tr>
                <form method="POST" action="{{ route('product.checkout') }}" enctype="multipart/form-data">
                @foreach ($lists as $obj)
                <tr>
                    <input name="ids[]" value="{{$obj->id}}" type="hidden">
                    <td  width="100"><img src="{{asset('uploads/product/'. $obj->oProduct->photo)}}" width="100"></td>
                    <td>{{$obj->oProduct->name}}</td>
                    <td>{{$obj->oProduct->price}} <input type="hidden" name="price_{{$obj->id}}" id="price_{{$obj->id}}" value="{{$obj->oProduct->price}}"></td>
                    <td><input name="qty_{{$obj->id}}" size="5" value="{{$obj->qty}}" id="qty_{{$obj->id}}" class="calAmount chkQty" data-id="{{$obj->id}}"></td>
                    <td><span id="amt_show_{{$obj->id}}">{{$obj->amount}}</span> <input type="hidden" id="amount_{{$obj->id}}" class="calToTotal" value="{{$obj->amount}}" name="amount_{{$obj->id}}"></td>
                    <td><a href="{{ route('product.deleteBasket', $obj->id) }}"><i class="far fa-trash-alt" style="font-size:1.5em;color:#888888"></i></a></td>
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
                            <table class="table table-responsive  w-100 d-block d-md-table">
                                <tr><td width="120"><span style="color:red">*</span> 姓名：</td>
                                    <td>
                                        <input type="text" id="name" name="name" value="" class="inline chkSubmitC"  style="width:100%">
                               
                                    </td>
                                    <td width="120"><span style="color:red">*</span> 電話：</td>
                                    <td><input type="text" id="mobile" name="mobile" value="" class="inline chkSubmitC"  style="width:100%"></td>
                                </tr>
                                <tr>
                                    <td ><span style="color:red">*</span> 地址：</td><td colspan=3>
                                        <input type="text" id="city" name="city" placeholder="縣市" class="inline chkSubmitC" value="" style="width:30%">
                                        <input type="text" id="town" name="town" placeholder="鄉鎮市區" value="" class="inline chkSubmitC" style="width:30%">
                                        <input type="text" id="zipcode" name="zipcode" placeholder="郵遞區號" value="" class="inline chkSubmitC" style="width:20%">
                                        <input type="text" id="address" name="address" placeholder="路街巷弄門號" value="" class="inline chkSubmitC"  style="width:100%">
                                    </td>
                                </tr>
                                <tr>		
                                    <td width="120"><span style="color:red">*</span> Email：</td><td colspan=3>
                                    <input type="text" id="email" name="email" value="" class="inline chkSubmitC"  style="width:100%"></td>	
                                </tr>
                                
                                <tr>		
                                    <td colspan="4"><input type="checkbox" id="agree_mem" name="agree_mem" value="1" checked> 我同意加入並成為BuyTest之會員 (電話為會員帳號) </td>
                                </tr>	
                                 <tr>		
                                    <td width="120"> 密碼：</td><td><input type="password" id="password" name="password" value="" class="chkPass"  style="width:100%"></td>
                                    <td width="120"> 確認密碼：</td><td><input type="password" id="password2" name="password_confirmation" value="" class="chkPass"  style="width:100%"> <span id="show_pass_err"></td>
                                </tr>
                                </table>
                               
                                <h4>送貨資料 <span style="font-size:12px"><input type="checkbox" name="same_buyer" id="same_buyer"> 同訂購人</span></h4>
                                <table class="table table-responsive  w-100 d-block d-md-table">
                                <tr>
                                    <td width="120">送貨方式</td>
                                    <td>
                                        <select id="cvs_type" name="cvs_type">
                                                <option value="0">宅配</option>                        
                                               
                                        </select>
                                    </td>	
                                    <td width="120"><span class="cvs_span_show" style="display: none">取貨超商</span></td>
                                    <td>
                                        <span class="cvs_span_show" style="display: none">
                                        <select id="cvs_store" name="cvs_store">
                                            <option value="">[請選擇]</option>
                                            <option value="7NET">7-11</option>
                                            <option value="FAMI">全家</option>
                                        </select>
                                        </span>
                                    </td>	
                                </tr>		
                                <tr class="ship_addr_show"><td width="120"><span style="color:red">*</span> 收貨人：</td><td><input type="text" id="ship_to" name="ship_to" value="" class="inline chkSubmitCVS" style="width:100%"></td>
                                    <td width="120"><span style="color:red">*</span> 聯絡電話：</td><td><input type="text" id="ship_tel" name="ship_tel" value="" class="inline chkSubmitCVS" style="width:100%"></td>
                                </tr>
                                <tr class="ship_addr_show">
                                    <td width="120"><span style="color:red">*</span> 送貨地址：</td><td colspan=3>
                                        <input type="text" name="ship_city" id="ship_city" placeholder="縣市" value="" class="inline chkSubmitCVS" style="width:30%">
                                        <input type="text" name="ship_town" id="ship_town" placeholder="鄉鎮市區" value="" class="inline chkSubmitCVS" style="width:30%">
                                        <input type="text" name="ship_zipcode"  placeholder="郵遞區號"value="" class="inline chkSubmitCVS" style="width:20%" id="ship_zipcode">
                                        <input type="text" name="ship_address" id="ship_address" placeholder="路街巷弄門號"  value="" class="inline chkSubmitCVS" style="width:100%"></td>
                                </tr>
                                <tr>		
                                    <td width="120">附註：</td><td colspan=3>
                                    <input type="text" name="remark" value="" class="inline"  style="width:100%"></td>	
                                </tr>
                                
                            </table>
                                
                            <h4>發票資料</h4>
                            <table class="table  w-100 d-block d-md-table">
                                <tr>
                                    <td width="120" >開立聯數：</td>
                                    <td>
                                        <input type="radio" name="inv_type" value="2" checked> 2 聯 <input type="radio" name="inv_type" value="3"> 3 聯
                                    </td>
                                </tr>
                                <tr>
                                <td width="120">發票統編：</td>
                                <td colspan=3>
                                    <input type="text" name="inv_bin" value="" maxlength="8" class="inline" style="width:50%">
                                </td>
                                </tr>
                                <tr>
                                    <td width="120">發票抬頭：</td>
                                    <td colspan=3>
                                        <input type="text" name="inv_title" placeholder=""  value="" class="inline" style="width:100%">
                                    </td>
                                </tr>
                                
                            </table>    
                        </div>
                    </div>
                </div>  
                <div class="col-md-4" style="text-align:left">
                    <div class="card">
                        <div class="card-body bg-light">
                                <table class="table  w-100 d-block d-md-table">
                                        <input type="hidden" name="amount" id="amount" value="{{$amount}}">
                                        <input type="hidden" name="total" id="total" value="{{$total}}">
                                        <input type="hidden" name="shipping" id="shipping" value="{{$shipping->value}}">
                                        <tr><td style="border-top: none !important;">小計金額</td><td  class="text-right" style="border-top: none !important;"><span id="amt_show">{{$amount}}</span></td></tr>
                                        <tr><td>運費</td><td  class="text-right"><span id="ship_show">{{$shipping->value}}</span></td></tr>
                                        <tr><td>合計總額</td><td  class="text-right"><h3><span id="total_show">{{$total}}</span>元</h3></td></tr>	
                                        </table>
                                        <table class="table  text-left">
                                        <tr><td><h4 class="text-left">付款方式：</h4></td></tr>
                                        <tr>
                                            <td>
                                            <input type="radio" name="pay_type" value="1"  > <span style="height:30">貨到付款</span>
                                            </td>
                                        </tr>
                                                        
                                        <tr><td  class="text-right"></td></tr>
                                    </table>
                                    @if($count > 0)
                                    <input type="submit" class="btn btn-sm btn-primary" value="結帳付款" style="width:100%">
                                    @endif
                        </div>
                    </div>
                </div>  
            </form>
                
            </div>    
        </div>

        
  </section>
@endsection
