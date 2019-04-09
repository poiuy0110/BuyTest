@extends('frontend.layouts.master')
@section('title', 'Buy Test ')
@section('nav_home', 'active')

@section('content')
   <section>
        <div class="row div_paddind_15" style="margin-top:20px">
            
            <h3>{{$about->title}}</h3>
            <div class="col-md-12 col-sm-12 col-xs-12">
                {!! $about->desp !!}
            </div>
        </div>

        
  </section>
@endsection
