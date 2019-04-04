@extends('frontend.layouts.master')
@section('title', 'Buy Test ')
@section('nav_home', 'active')

@section('content')
   <section>
      <form method="POST" action="{{ route('frontend.sendForgetPass') }}" enctype="multipart/form-data">
        <div class="row div_margin_30">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center">
                {{ csrf_field() }}    
              <h4>忘記密碼</h4>
                  <fieldset>
                        
                            <div class="form-group">
                                <input class="form-control text-center" placeholder="電子信箱" name="email" type="text" value="" required>
                                @if($errors->has('email'))
                                    <div class="alert-sm alert-danger" role="alert">
                                      {{$errors->first('email')}}
                                    </div>
                                @endif
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
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
