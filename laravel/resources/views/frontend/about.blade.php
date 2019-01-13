@extends('frontend.layouts.master')
@section('title', 'About')
@section('nav_about', 'active')

@section('content')
    <section class="page-section about-heading">
      <div class="container">
        <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="{{$about->image_path}}" alt="">
        <div class="about-heading-content">
          <div class="row">
            <div class="col-xl-9 col-lg-10 mx-auto">
              <div class="bg-faded rounded p-5">
                <h2 class="section-heading mb-4">
                <span class="section-heading-upper">{{ $website->subtitle }}</span>
                  <span class="section-heading-lower">{{ $website->title }}</span>
                </h2>
                <p>
                  {!! $about->content !!}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection