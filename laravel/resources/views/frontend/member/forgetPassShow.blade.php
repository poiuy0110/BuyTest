@extends('frontend.layouts.master')
@section('title', 'Buy Test ')
@section('nav_home', 'active')

@section('content')
   <section>
      <form method="POST" action="{{ route('member.chgForgotPass') }}" enctype="multipart/form-data">
        <div class="row div_margin_30">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center">
                {{ csrf_field() }}    
              <h4>變更密碼</h4>
                    <input type="hidden" name="id" value="{{$member->id}}">
                  <fieldset>
                            <div class="form-group">
                                <input class="form-control text-center" name="password" type="password" placeholder="請輸入新密碼">
                            </div >
                            <div class="form-group">
                                <input class="form-control text-center" name="password_confirmation" type="password" placeholder="請再次輸入新密碼">
                            </div >
                            @if($errors->has('password'))
                            <div class="alert-sm alert-danger" role="alert">
                              {{$errors->first('password')}}
                            </div>
                            @endif
                    <input class="btn btn-lg btn-block btn_fronted_def" type="submit" value="送出">
                  </fieldset>
            </div>
          <div class="col-md-4"></div>
        </div>
      </form>
  </section>
@endsection
