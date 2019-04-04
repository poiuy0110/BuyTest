<div class="row">
        <table class="table table-responsive w-100 d-block d-md-table">
            <tr style="background-color:#f2dede">
                <th>訂單編號</th>
                <th>訂單日期</th>
                <th>訂單總額</th>
                <th>付款方式</th>
                <th>配送狀態</th>
                <th>發票號碼</th>
                <th>&nbsp;</th>
            </tr>
            @foreach ($lists as $obj)
            <tr>
                <td>{{$obj->odr_no}}</td>
                <td>{{$obj->odr_date}}</td>
                <td>{{$obj->total}}</td>
                <td>{{$obj->pay_str}}</td>
                <td>{{$obj->ship_str}}</td>
                <td>{{$obj->inv_no}}</td>
                <td><a href="{{ route('orders.show', $obj->id) }}"><i class="fas fa-search-plus" style="font-size:1.5em;color:#888888"></i></a></td>
            </tr>
            </tr>
            @endforeach   
        </table>
    </div>
