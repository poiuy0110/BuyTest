@extends('frontend.layouts.master')
@section('title', 'Buy Test ')
@section('nav_home', 'active')

@section('content')
   <section>
   <div style="width:100%" id="owl_test" class="slider_mgs_carousel owl-carousel owl-theme owl-loaded">
      @foreach ($index_photo_lists as $obj) 
        <div><a href="{{$obj->url}}" target="_blank"><img src="{{$obj->photo_path}}"></a></div>
      @endforeach
   </div>
   <h3>主題活動</h3>
   <div class="row">
      @foreach ($news_lists as $obj) 
      
      <div class="col-md-3 col-sm-3 col-xs-12">
          <a href="{{ route('frontend.newsShow', $obj->id) }}" style="color:rgba(0,0,0,.5)">
        <div class="card">
          @isset($obj->photo)<img class="card-img-top" src="{{asset('uploads/news/'. $obj->photo)}}" >@endisset
          <div class="card-body">
          <p class="card-text">{{$obj->subject}}</p>
          </div>
        </div>
        </a>
      </div>
     
      @endforeach
    </div>
   <h3>熱門商品</h3>
   <div class="row">
      @foreach ($hot_lists as $obj) 
      <div class="col-md-3 col-sm-3 col-xs-12" style="margin-bottom:10px">
        <a href="{{ route('product.prodShow', $obj->id) }}" style="color:rgba(0,0,0,.5)">
        <div class="card">
          <img class="card-img-top" src="{{asset('uploads/product/'. $obj->photo)}}" >
          <div class="card-body">
          <p class="card-text text-center">{{$obj->name}}</p>
          </div>
        </div>
      </a>
      </div>
      
      @endforeach
    </div>
  
  

  </section>
@endsection
