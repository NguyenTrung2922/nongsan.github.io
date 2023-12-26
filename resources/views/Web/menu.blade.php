<nav id="myMenu" class="navbar-main navbar navbar-default cl-pri">
    <!-- MENU MAIN -->
    <div class="container nav-wrapper check_nav">
        <div class="row">
            <div class="navbar-header">
                <div class="pull-right mobile-menu-icon-wrapper">
                    <ul class="mobile-menu-icon">

                        <li id="cart-target" class="cart">
                            <a href="/carts" class="cart " title="Giỏ hàng">
                                <span class="fa fa-shopping-cart"></span>
                                <span id="cart-count">{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}</span>
                            </a>
                        </li>

                        <li class="user"><a href="/admin/users/login" title="Đăng nhập" class="fa fa-user"></a></li>

                        </li>


                    </ul>

                </div>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav clearfix">


                    <li>
                        <a href="/" class=" current" title="Trang chủ">
                            <span>Trang chủ</span>
                        </a>
                    </li>


                    @foreach($category as $item)
                    <li class="dropdown">
                        <a href="/sanpham/{{$item->slug}}/{{$item->id}}" title="Sản phẩm" class="">
                            <span>{{$item->name}}</span>
                        </a>

                        @if($item->categoryChildrent && $item->categoryChildrent->count() > 0)
                        <ul class="dropdown-menu" role="menu">
                            @foreach($item->categoryChildrent as $children)
                            <li>
                                <a href="/sanpham/{{$children->slug}}/{{$children->id}}" title="Tất cả sản phẩm">{{$children->name}}</a>
                                @if($children->categoryChildrent && $children->categoryChildrent->count() > 0)
                                <ul class="dropdown-menu">
                                    @foreach($children->categoryChildrent as $childrenGrand)
                                    <li>
                                        <a href="/sanpham/{{$childrenGrand->name}}/{{$childrenGrand->id}}" title="Camera giao thông">{{$childrenGrand->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach




                    <li class="dropdown">
                        <a href="{{ url('/chinhsach/' . Str::slug('Chính sách')) }}" title="Chính Sách" class="">
                            <span>Chính Sách</span>
                        </a>
                        <ul class="dropdown-menu" role="menu">

                            <li>
                                <a href="{{ url('/chinhsach/' . Str::slug('Chính sách vận chuyển')) }}" title="CHÍNH SÁCH VẬN CHUYỂN">CHÍNH SÁCH VẬN
                                    CHUYỂN</a>

                            </li>

                            <li>
                                <a href="{{ url('/chinhsach/' . Str::slug('Chính sách đổi trả')) }}" title="CHÍNH SÁCH ĐỔI TRẢ">CHÍNH
                                    SÁCH ĐỔI TRẢ</a>

                            </li>

                            <li>
                                <a href="{{ url('/chinhsach/' . Str::slug('Chính sách bảo mật')) }}" title="CHÍNH SÁCH BẢO MẬT">CHÍNH
                                    SÁCH BẢO MẬT</a>

                            </li>

                            <li>
                                <a href="{{ url('/chinhsach/' . Str::slug('chinhsachdaily')) }}" title="CHÍNH SÁCH ĐẠI LÝ">CHÍNH SÁCH
                                    ĐẠI LÝ</a>

                            </li>

                            <li>
                                <a href="{{ url('/chinhsach/' . Str::slug('Phương thức thanh toán')) }}" title="PHƯƠNG THỨC THANH TOÁN">PHƯƠNG THỨC
                                    THANH
                                    TOÁN</a>

                            </li>

                            <li>
                                <a href="{{ url('/chinhsach/' . Str::slug('Thông tin chuyển khoản')) }}" title="THÔNG TIN CHUYỂN KHOẢN">THÔNG TIN
                                    CHUYỂN
                                    KHOẢN</a>

                            </li>

                            <li>
                                <a href="{{ url('/chinhsach/' . Str::slug('Hướng dẫn mua hàng')) }}" title="HƯỚNG DẪN MUA HÀNG">HƯỚNG
                                    DẪN MUA HÀNG</a>

                            </li>

                        </ul>
                    </li>



                    <li>
                        <a href="{{ url('/tintuc/' . Str::slug('Tin tức')) }}" class="" title="Tin tức">
                            <span>Tin tức</span>
                        </a>
                    </li>



                    <li>
                        <a href="/lien-he" class="" title="Liên Hệ">
                            <span>Liên Hệ</span>
                        </a>
                    </li>



                    <li>
                        <a href="{{ url('/huongdanmuahang/' . Str::slug('Hướng dẫn mua hàng')) }}" class="" title="Hướng dẫn mua hàng">
                            <span>Hướng dẫn mua hàng</span>
                        </a>
                    </li>


                </ul>

            </div>


            <div class="hidden-xs pull-right right-menu">
                <ul class="nav navbar-nav pull-right">

                    <li id="user-icon" style="display: flex; align-items: center;">
                        <ul>




                            <li> <a class="log" href="/admin/users/login" title="Đăng nhập">Đăng nhập</a>
                            </li>




                        </ul>
                    </li>


                    <li class="">
                        <ul class="nodrop">
                            <li id="search-icon" class="drop-control">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle icon-search" data-toggle="dropdown" aria-expanded="false">

                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="search-bar">
                                            <div class="">
                                                <form class="col-md-12" action="search.html">
                                                    <input type="hidden" name="type" value="product" />
                                                    <input type="text" name="q" placeholder="Tìm kiếm..." />
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Card -->

                    <li class="">
                        <ul class="nodrop">
                            <li id="cart-target1" class="toolbar-cart">
                                <a href="/carts" id="cart-link" title="Giỏ hàng" class="cart">
                                    <span class="icon-cart"></span>
                                    <span>

                                        <span>{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}</span>

                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li id="user-icon" style="display: flex; align-items: center">
                        <ul>
                            <li style="display: flex; flex-direction: column; align-items: center;">
                                <a class="log" title="Đăng nhập">Liên hệ</a>
                                <span><a href="tel:0989 168 262">
                                        <i class="fa fa-mobile" aria-hidden="true" style="font-size: 25px;"></i> 0989
                                        168 262
                                    </a></span>
                            </li>
                        </ul>
                    </li>



                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div><!-- End container  -->






</nav>