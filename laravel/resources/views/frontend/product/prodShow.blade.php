@extends('frontend.layouts.master')
@section('title', 'Buy Test ')
@section('nav_home', 'active')

@section('content')
   <section>
        <div class="row div_paddind_15" style="margin-top:20px">
            <div class="col-md-12 col-sm-12 col-xs-12"><span style="font-size: 1.2em; color:#F78181;"><a href="{{ route('product.prodLists', $cate->id) }}" style="color:#F78181;">{{$cate->name}}</a>-><a href="{{ route('product.prodLists', [$cate->id, $store->id]) }}"  style="color:#F78181;">{{$store->name}}</a></span></div>
            <div class="col-md-6 col-sm-6 col-xs-12"><img src="{{asset('uploads/product/'. $product->photo)}}" style="width:80%"></div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <form method="POST" action="{{ route('product.addToBasket') }}" enctype="multipart/form-data">
                    <input type="hidden" name="prod_id" value="{{$product->id}}">
                    <h3 style="color:#888888;">{{$product->name}}</h3>
                    <p style="font-size: 1.2em">NT$ {{$product->price}}</p>
                    <input type="submit" class="btn btn-sm btn-primary" value="加入購物車" style="width:30%">
                </form>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                {!! $product->desp !!}
            </div>
        </div>

        
  </section>
@endsection
