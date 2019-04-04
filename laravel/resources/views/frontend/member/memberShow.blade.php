@extends('frontend.layouts.master')
@push('head')
<script src="{{ asset('js/member.js') }}"></script>
@endpush
@section('title', 'Buy Test ')
@section('nav_home', 'active')


@section('content')

   <section>
    <div class="row div_paddind_15"  style="margin-top:20px">
        <div class="col-md-12">

                <ul class="nav nav-pills">
                        <li class="nav-item">
                          <a class="nav-link active" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="true" style="color:rgba(0,0,0,.5)">歷史訂單</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="member-tab" data-toggle="tab" href="#member" role="tab" aria-controls="member" aria-selected="false" style="color:rgba(0,0,0,.5)">基本資料</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link"  id="pass-tab" data-toggle="tab" href="#pass" role="tab" aria-controls="pass" aria-selected="false" style="color:rgba(0,0,0,.5)">變更密碼</a>
                        </li>
                       
                      </ul>
        </ul>
        </div>
    
        <!-- /.row -->
    <div class="col-md-12">
        <br>
        <div id="show_lists">
        </div>
    </div>
  </section>
@endsection
