<div class="row bg-light" >
    <div class="col-md-4 col-sm-4 col-xs-12 text-center"></div>
    <div class="col-md-8 col-sm-8 col-xs-12 text-right">
            <nav class="navbar navbar-expand-lg navbar-light bg-light margin_15" style="float:right;">
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav">
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('product.basketShow') }}">購物車</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">粉絲團</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}">回首頁</a>
                        </li>   
                        <li class="nav-item">
                          @if(Auth::guard('frontend')->check())
                            <a class="nav-link" href="{{ route('frontend.logout') }}">登出</a>
                          @else
                            <a class="nav-link" href="{{ route('member.login') }}">登入</a>
                          @endif
                        </li>          
                              
                      </ul>
                    </div>
                  </nav>
    </div>
</div>