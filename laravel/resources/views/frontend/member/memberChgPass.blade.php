<div class="row">
    
        <div class="col-md-12">
        <form method="POST" action="{{ route('member.memberChgPassSave') }}" enctype="multipart/form-data">
            <div class="form-group">
                <input class="form-control text-center" name="old_pass" placeholder="請輸入舊密碼">
            </div >
            <div class="form-group">
                <input class="form-control text-center" name="password" placeholder="請輸入新密碼">
            </div >
            <div class="form-group">
                <input class="form-control text-center" name="password_confirmation" placeholder="請再次輸入新密碼">
            </div >
            <input type="submit" style="background-color:#0070c9;width:100%;color:white" class="btn btn-sm" value="送出" >
        </form>  
        </div>
    
    </div>
