<nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Buy Test</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    最新消息
                 </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('admin.about.index') }}">關於我們</a>
                    <a class="dropdown-item" href="{{ route('admin.news.index') }}">主題活動</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    會員管理    
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('admin.member.index') }}">會員管理</a>
                    <a class="dropdown-item" href="{{ route('admin.home.edit') }}">電子報訂閱</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    商品管理    
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('admin.category.index') }}">類別設定</a>
                    <a class="dropdown-item" href="{{ route('admin.product.index') }}">商品管理</a>
                    <!--<a class="dropdown-item" href="{{ route('admin.home.edit') }}">商品評價管理</a>
                    <a class="dropdown-item" href="{{ route('admin.home.edit') }}">產品資訊</a>
                    <a class="dropdown-item" href="{{ route('admin.home.edit') }}">集點類別</a>-->
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-item nav-link" href="{{ route('admin.orders.index') }}">訂單管理</a>
            </li>
            <li class="nav-item">
                <a class="nav-item nav-link" href="{{ route('admin.about.index') }}">出貨管理</a>
            </li>
            <li class="nav-item">
                <a class="nav-item nav-link" href="{{ route('admin.product.index') }}">商家管理</a>
            </li>
            <li class="nav-item">
                <li><a class="nav-item nav-link" href="{{ route('admin.store.index') }}">賣家管理</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    基本設定   
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('admin.home.edit') }}">電子信範本</a>
                    <a class="dropdown-item" href="{{ route('admin.home.edit') }}">郵遞區號</a>
                    <a class="dropdown-item" href="{{ route('admin.indexslide.index') }}">首頁輪播圖</a>
                    <a class="dropdown-item" href="{{ route('admin.home.edit') }}">發票號碼設定</a>
                    <a class="dropdown-item" href="{{ route('admin.home.edit') }}">常見問題</a>
                    <a class="dropdown-item" href="{{ route('admin.params.index') }}">參數設定</a>  
                </div>
            </li>
            <li class="nav-item">
                <li><a class="nav-item nav-link" href="{{ route('admin.store.index') }}">使用者管理</a>
            </li>
          </ul>
          <ul class="nav navbar-nav ml-auto" >
                <li><a href="{{ route('admin.logout') }}" style="color:rgba(255,255,255,.5);">登出</a></li>
            </ul>
        </div>
      </nav>