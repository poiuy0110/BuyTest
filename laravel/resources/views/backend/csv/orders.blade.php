<table>
            <tr>
                <th>完成狀態</th>
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
            </tr>
            @foreach ($lists as $obj) 
                <tr>
                    <td>{{ $obj->status_str }}</td>
                    <td>{{ $obj->odr_no }}</td>
                    <td>{{ $obj->odr_date }}</td>
                    <td>{{ $obj->login_id }}</td>
                    <td>{{ $obj->mem_name }}</td>
                    <td>{{ $obj->bill_to }}</td>
                    <td>{{ $obj->inv_date }}</td>
                    <td>{{ $obj->inv_no }}</td>
                    <td>{{ number_format($obj->amount) }}</td>
                    <td>{{ number_format($obj->tax) }}</td>
                    <td>{{ number_format($obj->total) }}</td>
                    <td>{{ $obj->status_str }}</td>
                    <td>{{ $obj->pay_str }}</td>
                    <td>{{ $obj->ship_str }}</td>
                    
                </tr>
            @endforeach
    </table>