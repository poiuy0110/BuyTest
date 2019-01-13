@extends('frontend.layouts.master')
@section('title', 'Products')
@section('nav_products', 'active')

@section('content')
@foreach ($products as $product)
<section class="page-section">
  <div class="container">
    <div class="product-item">
      <div class="product-item-title d-flex">
        <div class="bg-faded p-5 d-flex @if($loop->index % 2 == 1) mr-auto @else ml-auto @endif rounded">
          <h2 class="section-heading mb-0">
          <span class="section-heading-upper">{{ $product->subtitle }}</span>
            <span class="section-heading-lower">{{ $product->title }}</span>
          </h2>
        </div>
      </div>
      <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="img/products-01.jpg" alt="">
      <div class="product-item-description d-flex @if($loop->index % 2 == 1) mr-auto @else ml-auto @endif ">
        <div class="bg-faded p-5 rounded">
          <p class="mb-0">{!! $product->description !!}</p>
        </div>
      </div>
    </div>
  </div>
</section>
@endforeach
    


  @endsection

