    <!-- Navigation -->
    <div class="bg_blk">
        <nav class="navbar navbar-expand-lg navbar-light margin_30">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation" style="background-color:white">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
              <ul class="navbar-nav">
                @foreach ($cat_lists as $obj) 
                  <li class="nav-item hoverMenu mobile-hide" data-id="{{$obj->cat_id}}">
                    <a class="nav-link" href="{{ route('product.prodLists', $obj->cat_id) }}">{{$obj->name}}</a>
                        <ul id="hover_ul{{$obj->cat_id}}" class="hoverHide dropdown-menu" style="display:none;">
                          @foreach ($obj->store_lists as $obj2) 
                            <li><a href="{{ route('product.prodLists', [$obj->cat_id, $obj2->store_id]) }}" >{{$obj2->name}}</a></li>
                          @endforeach
                      </ul>
                  </li>
                @endforeach
                @foreach ($cat_lists as $obj) 
                <li class="nav-item mobile-show" data-id="{{$obj->cat_id}}">
                  <a class="nav-link" href="{{ route('product.prodLists', $obj->cat_id) }}">{{$obj->name}}</a>
                </li>
                @endforeach
                <li><a class="nav-link mobile-show" href="{{ route('index') }}">回首頁</a></li>
                <li><a class="nav-link mobile-show" href="{{ route('product.basketShow') }}">購物車</a></li>
                @if(Auth::guard('frontend')->check())
                <li><a class="nav-link mobile-show" href="{{ route('frontend.logout') }}">登出</a></li>
                 @else
                 <li><a class="nav-link mobile-show" href="{{ route('member.login') }}">登入</a></li>
                  @endif
              </ul>
            </div>
          </nav>
        </div>