<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<style>
	@font-face {
		font-family: 'msjh';
		font-style: normal;
		font-weight: normal;
		src: url({{ storage_path('fonts/msjh.ttf') }}) format('truetype');
	}
	body { 
		font-family: 'msjh';  
	}
					
</style>
<title>訂單列印</title>
</head>
@foreach($lists as $obj)
<body>
		<table class="table table-stripped table-bordered">
            
				<tr>
					<td class="info"  colspan="6" >訂單資料:</td>
				</tr>
				<tr>	
					<td  >訂單編號:</td>
					<td>{{ $obj->odr_no }}</td> 
					<td  >訂單日期:</td>
					<td>{{ $obj->odr_date }}</td> 
					<td  >訂單狀態:</td>
					<td>{{ $obj->status_str }}</td> 
				</tr>
				<tr>
					<td  >銷貨金額:</td>
					<td>{{ $obj->amount }}</td> 
					<td  >稅額:</td>
					<td>{{ $obj->tax }}</td> 
					<td  >銷貨總額:</td>
					<td>{{ $obj->total }}</td> 
				</tr>
				<tr>
					<td  >運費:</td>
					<td>{{ $obj->shipping }}</td> 
					<td  >付款方式:</td>
					<td>{{ $obj->pay_str }}</td> 
					<td  >配送方式:</td>
					<td>{{ $obj->ship_str }}</td> 
				</tr>
		
		
		
		
				<tr>
					<td class="info"  colspan="6">會員資料:</td>
				</tr>
				<tr>
					<td  >會員編號:</td>
					<td>{{ $obj->mem_id }}</td> 
					<td  >會員名稱:</td>
					<td>{{ $obj->mem_name }}</td> 
					<td  >會員帳號:</td>
					<td>{{ $obj->login_id }}</td> 
				</tr>
		
		
				<tr>
					<td class="info"  colspan="6">訂購資料:</td>
				</tr>
				<tr>
					<td  >訂購人姓名:</td>
					<td>{{ $obj->bill_to }}</td> 
					<td  >訂購人手機:</td>
					<td colspan="3">{{ $obj->bill_mobile }}</td> 
				</tr>
		
				<tr>
					<td  >訂購人地址:</td>
					<td colspan="5">{{ $obj->bill_address }}</td> 
				</tr>
		
				<tr>
					<td  >訂購人Email:</td>
					<td colspan="5">{{ $obj->bill_email }}</td> 
				</tr>
		
				<tr>
					<td class="info"  colspan="6">送貨資料:</td>
				</tr>
				<tr>
					<td  >收貨人:</td>
					<td>{{ $obj->ship_to }}</td> 
					<td  >連絡電話:</td>
					<td colspan="3">{{ $obj->ship_mobile }}</td> 
				</tr>
		
				<tr>
					<td  >收貨地址:</td>
					<td colspan="5">{{ $obj->ship_address }}</td> 
				</tr>
			</table>
			<table class="table table-stripped table-bordered">
				<tr>
					<td>商品名稱</td>
					<td>單價</td>
					<td>數量</td>
					<td>金額</td>
				</tr>
			@foreach ($obj->item_lists as $obj2) 
				<tr>
					<td class="align-left">{{$obj2->prod_name}}</td>
					<td class="align-right">{{ number_format($obj2->price) }}</td>
					<td class="align-right">{{ number_format($obj2->qty) }}</td>
					<td class="align-right">{{ number_format($obj2->amount) }}</td>
				</tr>
			@endforeach
			
			</table>
</body>
@endforeach
</html>