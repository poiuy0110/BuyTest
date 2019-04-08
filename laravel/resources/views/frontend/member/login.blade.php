@extends('frontend.layouts.master')
@section('title', 'Buy Test ')
@section('nav_home', 'active')

@section('content')
   <section>
      <form method="POST" action="{{ route('member.loginConfirm') }}" enctype="multipart/form-data">
        <div class="row div_margin_30">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center">
              <h4>會員登入</h4>
                  <fieldset>
                      @if(session()->has('success_message'))
                        <div class="alert alert-success">
                          {{ session()->get('success_message') }}
                        </div>
                      @endif
                      <div class="form-group">
                        <input class="form-control text-center" placeholder="帳號" name="login_id" type="text" value="" required>
                    </div>
                    <div class="form-group">
                      <input class="form-control text-center" placeholder="密碼" name="password" type="password" value="" required>
                    </div>
                    <input class="btn btn-lg btn-block btn_fronted_def" type="submit" value="登入">
                  </fieldset>
              <div class="" style="margin-top:10px"><a href="{{ route('frontend.forgetPass') }}">忘記密碼？</a> . &nbsp;<a href="{{ route('frontend.register') }}">新會員註冊？</a></div>
                      
            </div>
          <div class="col-md-4"></div>
        </div>
      </form>
  </section>
@endsection
