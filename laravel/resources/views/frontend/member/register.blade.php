@extends('frontend.layouts.master')
@section('title', 'Buy Test ')
@section('nav_home', 'active')

@section('content')
   <section>
      <form method="POST" action="{{ route('frontend.registerSave') }}" enctype="multipart/form-data">
        <div class="row div_margin_30">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center">
                {{ csrf_field() }}    
              <h4>會員註冊</h4>
                  <fieldset>
                        <div class="form-group">
                                <input class="form-control text-center" placeholder="帳號" name="login_id" type="text" value="" required>
                                @if($errors->has('login_id'))
                                    <div class="alert-sm alert-danger" role="alert">
                                      {{$errors->first('login_id')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <input class="form-control text-center" placeholder="新密碼" name="password" type="password" value="" required>
                                @if($errors->has('password'))
                                    <div class="alert-sm alert-danger" role="alert">
                                      {{$errors->first('password')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <input class="form-control text-center" placeholder="再確認密碼" name="password2" type="password" value="" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control text-center" placeholder="會員姓名" name="name" type="text" value="" required>
                                @if($errors->has('name'))
                                    <div class="alert-sm alert-danger" role="alert">
                                      {{$errors->first('name')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <input class="form-control text-center" placeholder="電子信箱" name="email" type="text" value="" required>
                                @if($errors->has('email'))
                                    <div class="alert-sm alert-danger" role="alert">
                                      {{$errors->first('email')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <input class="form-control text-center" placeholder="行動電話" name="phone" type="text" value="">
                                @if($errors->has('mobile'))
                                    <div class="alert-sm alert-danger" role="alert">
                                      {{$errors->first('mobile')}}
                                    </div>
                                @endif
                            </div>
                    <input class="btn btn-lg btn-block btn_fronted_def" type="submit" value="送出">
                  </fieldset>
            </div>
          <div class="col-md-4"></div>
        </div>
      </form>
  </section>
@endsection
