<div class="row">
    <div class="col-md-12">
    <form method="POST" action="{{ route('member.memberSave') }}" enctype="multipart/form-data">
        <table class="table table-responsive  w-100 d-block d-md-table">
                <tr><td width="120">姓名：</td>
                    <td>
                        <input type="text" id="name" name="name" value="{{$member->name}}" class="inline chkSubmitC"  style="width:100%">
               
                    </td>
                    <td width="120"> 電話：</td>
                    <td><input type="text" id="mobile" name="mobile" value="{{$member->mobile}}" class="inline chkSubmitC"  style="width:100%"></td>
                </tr>
                <tr>
                    <td >地址：</td><td colspan=3>
                        <input type="text" id="city" name="city" placeholder="縣市" class="inline chkSubmitC" value="{{$member->city}}" style="width:30%">
                        <input type="text" id="town" name="town" placeholder="鄉鎮市區" value="{{$member->town}}" class="inline chkSubmitC" style="width:30%">
                        <input type="text" id="zipcode" name="zipcode" placeholder="郵遞區號" value="{{$member->zipcode}}" class="inline chkSubmitC" style="width:20%">
                        <input type="text" id="address" name="address" placeholder="路街巷弄門號" value="{{$member->address}}" class="inline chkSubmitC"  style="width:100%">
                    </td>
                </tr>
                <tr>		
                    <td width="120"> Email：</td><td colspan=3>
                    <input type="text" id="email" name="email" value="{{$member->email}}" class="inline chkSubmitC"  style="width:100%"></td>	
                </tr>
                

                </table>
               

                
            <h4>發票資料</h4>
            <table class="table  w-100 d-block d-md-table">
                <tr>
                    <td width="120" >開立聯數：</td>
                    <td>
                        <input type="radio" name="inv_type" value="2" {{ $member->inv_type == '2' ? 'checked' :''  }}> 2 聯 <input type="radio" name="inv_type" value="3" {{ $member->inv_type == '3' ? 'checked' :''  }}> 3 聯
                    </td>
                </tr>
                <tr>
                <td width="120">發票統編：</td>
                <td colspan=3>
                    <input type="text" name="inv_bin" value="{{$member->inv_bin}}" maxlength="8" class="inline" style="width:50%">
                </td>
                </tr>
                <tr>
                    <td width="120">發票抬頭：</td>
                    <td colspan=3>
                        <input type="text" name="inv_title" placeholder=""  value="{{$member->inv_title}}" class="inline" style="width:100%">
                    </td>
                </tr>
                <tr>
                    <td colspan="4"> <input type="submit" style="background-color:#0070c9;width:100%;color:white" class="btn btn-sm" value="送出" ></td>
                </tr>    
        </table>  
    </form>  
</div>
    </div>
