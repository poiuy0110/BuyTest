@extends('frontend.layouts.master')
@section('title', 'Buy Test ')
@section('nav_home', 'active')

@section('content')
   <section>
        <div class="row div_paddind_15">
                <div class="col-lg-12 ">
                    <h1><a href="{{ route('product.prodLists', $cate->id) }}" style="color:#888888; text-decoration:none">{{$cate->name}} </a> </h1>
                </div>
                <div class="col-lg-12 ">
                  @foreach ($store_lists as $obj) 
                    <a href="{{ route('product.prodLists', [$cate->id, $obj->store_id]) }}" style="text-decoration:none"><span style="color:#F78181;font-size: 1.2em">{{$obj->name}} | </span></a>
                  @endforeach
                </div>
        </div>
                <div style="text-align:center">
                  <div class="row div_paddind_15" style="width:100%; margin-left:auto;margin-right:auto">
                @foreach ($lists as $obj)
                  <div class="col-xs-12 col-sm-6 col-md-2">
                    <a href="{{ route('product.prodShow', $obj->id) }}"> 
                    <div style="margin-top:10px">
                        <img class="img-responsive" src="{{asset('uploads/product/'. $obj->photo)}}" alt="" style="border:1px solid #eeeeee; width: 100%;">	
                    </div>
                    <div style="text-align:center;padding:1px;height:54px"> 
                      <p><span style="font-size:15px;color:#888888; text-decoration:none">&nbsp;<b>{{$obj->name}}</b><br>&nbsp;</span></p>
                    </div>
                    </a> 
                  </div>
               
                @endforeach
              </div> 
              </div> 

        
  </section>
@endsection
