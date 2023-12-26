@extends('Web.main')

@section('content')

    <div class=" row" style="width: 100%; margin: 0px; padding: 0px 20px">
        <div id="myCarousel" class="carousel slide col-md-9" data-ride="carousel" style="margin: 0xp">

            <div class="carousel-inner" role="listbox">
                @foreach ($banner as $index => $singleBanner)
                    <div class="item {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $singleBanner->thumb) }}" alt="Slide {{ $index + 1 }}"
                            id="slides-home">
                    </div>
                @endforeach
            </div>

            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" id="right-carousel-control" href="#myCarousel" role="button"
                data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="col-md-3" style="padding: 0; margin: 0">
            <!-- Cột chứa nội dung điện công nghiệp -->
            <div class="product-list clearfix">
                <div class="news-latest list-group" style="margin: 0;">
                    <span class="list-group-item active" style="position: absolute; top: 0; width: 100%; z-index: 2;">
                        Bài viết mới nhất
                    </span>
                    <div style="margin-top: 50px">
                        @if ($newss)
                            @foreach ($newss as $new)
                                <div class="article" style="margin-top: 5px">

                                    <div class="col-ld-3 col-md-3 col-sm-4 col-xs-4">
                                        <a href="/tintuc/detail/{{ $new->id }}-{{ Str::slug($new->name, '-') }}.html"><img
                                                src="{{ '/storage/' . $new->thumb }}" alt="{{ $new->name }}" /></a>
                                    </div>

                                    <div class="post-content col-lg-9 col-md-9 col-sm-8 col-xs-8 ">
                                        <a
                                            href="/tintuc/detail/{{ $new->id }}-{{ Str::slug($new->name, '-') }}.html">{{ $new->name }}</a><span
                                            class="date"> <i class="time-date"></i>{{ $new->date }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>


    <section id="content">


        <h1 class="hidden">Trường Đức - Thiết bị điện thông minh</h1>

        <div class="container-fluid row" style="margin-top: 20px; width: 100%">

            <!-- Cột 1 -->
            <div class="col-md-3">
                <div class="container">
                    @include('Web.sidebar')
                </div>

            </div>

            <!-- Cột 2 -->
            <div class="col-md-9">
                <!-- Cột chứa sản phẩm trang chủ -->
                <div class="main-content">
                    <div class="title-line">
                        <h3>tất cả sản phẩm</h3>
                    </div>
                    <!-- Sản phẩm trang chủ -->
                    <div class="row content-product-list products-resize">
                        @foreach ($product as $product)
                            <form action="/add-cart" method="POST">
                                <div class="col-md-3 col-sm-6 col-xs-6 pro-loop">

                                    <div class="product-block product-resize fixheight" style="height: 421px;">
                                        <div class="product-img image-resize view view-third clearfix"
                                            style="height: 218px;">

                                            @if ($product->firstImage)
                                                <a href="/detail/{{ $product->id }}-{{ Str::slug($product->name, '-') }}.html"
                                                    title="{{ $product->firstImage->name }}">
                                                    <img alt="{{ $product->firstImage->name }}"
                                                        src="{{ '/images/' . $product->firstImage->name }}">
                                                </a>
                                            @endif
                                        </div>

                                        <div class="product-detail clearfix">


                                            <!-- sử dụng pull-left -->
                                            <p class="pro-price"> {{ number_format($product->price, 0, '', '.') }} đ
                                            </p>
                                            <p class="pro-price-del text-left">
                                            </p>
                                            <h3 class="pro-name"><a
                                                    href="/detail/{{ $product->id }}-{{ Str::slug($product->name, '-') }}.html"
                                                    title="{{ $product->name }}">{{ $product->name }} </a></h3>
                                            <input id="quantity" type="hidden" name="quantity" min="1"
                                                value="1" class="tc item-quantity" />
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <div class="add-cart">


                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <button type="submit" title="{{ $product->name }}"
                                                    style="border: none; background: none; padding: 0; margin: 0;">
                                                    <img class="add-cart-img"
                                                        src="https://theme.hstatic.net/1000162838/1000469515/14/add-cart.png?v=657"
                                                        alt="cart">
                                                </button>




                                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                            </div>


                                        </div>
                                    </div>


                                </div>
                                @csrf

                            </form>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-12 pull-center">
                            <a class="btn btn-readmore" href="/sanpham/{{ $category[0]->slug }}/{{ $category[0]->id }}"
                                role=" button">Xem
                                thêm </a>
                        </div>
                    </div>
                </div>

                <div class="product-list clearfix ">
                    <div class="title-line">
                        <h3>SẢN PHẨM BÁN CHẠY</h3>
                    </div>

                    <div class="row content-product-list products-resize">
                        @foreach ($topseling as $product)
                            <div class="col-md-3 col-sm-6 col-xs-6 pro-loop">
                                <!--sử dụng end -->

                                <form action="/add-cart" method="POST">

                                    <div class="product-block product-resize">
                                        <div class="product-img image-resize view view-third clearfix">

                                            <a href="/detail/{{ $product['product']->id }}-{{ Str::slug($product['product']->name, '-') }}.html"
                                                title="{{ $product['product']->name }}">
                                                @if ($product['images'])
                                                    {{-- Lấy chỉ ảnh đầu tiên --}}
                                                    @php
                                                        $firstImage = $product['images']->first();
                                                    @endphp
                                                    <img alt="{{ $product['product']->name }}"
                                                        src="{{ '/images/' . $firstImage->name }}" />
                                                @endif
                                            </a>

                                        </div>

                                        <div class="product-detail clearfix">


                                            <!-- sử dụng pull-left -->
                                            <p class="pro-price">
                                                {{ number_format($product['product']->price, 0, '', '.') }}
                                                đ
                                            </p>
                                            <p class="pro-price-del text-left">
                                                </h3>
                                            <h3 class="pro-name">
                                                <a href="/detail/{{ $product['product']->id }}-{{ Str::slug($product['product']->name, '-') }}.html"
                                                    title="aaa">
                                                    {{ $product['product']->name }}
                                                </a>
                                            </h3>

                                            <input id="quantity" type="hidden" name="quantity" min="1"
                                                value="1" class="tc item-quantity" />

                                            <div class="add-cart">



                                                <button type="submit" title="{{ $product['product']->name }}"
                                                    style="border: none; background: none; padding: 0; margin: 0;">
                                                    <img class="add-cart-img"
                                                        src="https://theme.hstatic.net/1000162838/1000469515/14/add-cart.png?v=657"
                                                        alt="cart">
                                                </button>




                                                <input type="hidden" name="product_id"
                                                    value="{{ $product['product']->id }}">

                                            </div>

                                        </div>
                                    </div>
                                    @csrf
                                </form>

                            </div>
                        @endforeach
                    </div>

                </div>

                {{-- <div class="product-list clearfix ">
                    <div class="title-line">
                        <h3>ĐIỆN CÔNG NGHIỆP</h3>
                    </div>

                    <div class="row content-product-list products-resize">
                        @foreach ($tuya as $tuya)
                            <div class="col-md-3 col-sm-6 col-xs-6 pro-loop">
                                <!--sử dụng end -->

                                <form action="/add-cart" method="POST">

                                    <div class="product-block product-resize">
                                        <div class="product-img image-resize view view-third clearfix">
                                            @if ($tuya->firstImage)
                                                <a href="/detail/{{ $tuya->id }}-{{ Str::slug($tuya->name, '-') }}.html"
                                                    title="{{ $tuya->firstImage->name }}">
                                                    <img alt="{{ $tuya->firstImage->name }}"
                                                        src="{{ '/images/' . $tuya->firstImage->name }}"
                                                        alt="{{ $tuya->firstImage->name }}" />
                                                </a>
                                            @endif
                                        </div>

                                        <div class="product-detail clearfix">


                                            <!-- sử dụng pull-left -->
                                            <p class="pro-price">{{ number_format($tuya->price, 0, '', '.') }} đ
                                            </p>
                                            <p class="pro-price-del text-left">
                                                </h3>
                                            <h3 class="pro-name"><a
                                                    href="/detail/{{ $tuya->id }}-{{ Str::slug($tuya->name, '-') }}.html"
                                                    title="{{ $tuya->name }}">{{ $tuya->name }} </a></h3>

                                            <input id="quantity" type="hidden" name="quantity" min="1"
                                                value="1" class="tc item-quantity" />
                                            <div class="add-cart">



                                                <button type="submit" title="{{ $tuya->name }}"
                                                    style="border: none; background: none; padding: 0; margin: 0;">
                                                    <img class="add-cart-img"
                                                        src="https://theme.hstatic.net/1000162838/1000469515/14/add-cart.png?v=657"
                                                        alt="cart">
                                                </button>




                                                <input type="hidden" name="product_id" value="{{ $tuya->id }}">

                                            </div>

                                        </div>
                                    </div>
                                    @csrf
                                </form>

                            </div>
                        @endforeach
                    </div>

                </div> --}}

            </div>
        </div>





    </section>





    <!--Begin: Bài viết mới nhất-->

    <!-- <div class="post_new" style="clear:both;">
                                        <div class="container">
                                            <div class="row">
                                                <div class="title-line">
                                                    <h3>Bài viết mới nhất</h3>
                                                </div>

                                                @foreach ($newss as $new)
    <div class="col-xs-12 col-sm-6 col-md-3">
                                                    <a href="/tintuc/detail/{{ $new->id }}-{{ Str::slug($new->name, '-') }}.html">
                                                        <img class="url-img" src="{{ '/storage/' . $new->thumb }}" alt="{{ $new->name }}">
                                                    </a>
                                                    <a href="/tintuc/detail/{{ $new->id }}-{{ Str::slug($new->name, '-') }}.html" class="title_new_post">
                                                        <h3>
                                                            {{ $new->name }}
                                                        </h3>
                                                    </a>
                                                    <p class="time_stamp">
                                                        <i class="time-date"></i>{{ $new->date }}
                                                    </p>
                                                </div>
    @endforeach

                                            </div>
                                        </div>
                                    </div> -->

    <!--End: Bài viết mới nhất-->

    <div class="cs_muahang" style="clear: both;">


        <div class="container clearfix">
            <div class="row cs_buy">

                <div class="title-line">
                    <h3>CHÍNH SÁCH BÁN HÀNG</h3>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="deliver-top-no deliver-dt" style="padding-left:45px">
                        <a href="">
                            <div class="tit">MIỄN PHÍ VẬN CHUYỂN</div>
                            <div class="descrip">Đơn hàng trên 500.000đ</div>
                        </a>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="deliver-top-no deliver-ch" style="padding-left:45px;background:none !important">
                        <div style="position:absolute;margin-left: -45px;">

                            <img src="https://theme.hstatic.net/1000162838/1000469515/14/icon-day90.png?v=657">

                        </div>
                        <a href="">
                            <div class="tit">CHÍNH SÁCH ĐỔI TRẢ</div>
                            <div class="descrip">Đổi sang sản phẩm khác có giá trị tương đương trong
                                7 ngày</div>
                        </a>
                    </div>

                </div>

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="deliver-top-no deliver-pay" style="padding-left:45px">
                        <a href="">
                            <div class="tit">THANH TOÁN NHANH </div>
                            <div class="descrip">Thanh toán khi nhận hàng (COD)</div>
                        </a>
                    </div>

                </div>

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="deliver-top-no deliver-phone" style="padding-left:45px">
                        <div class="tit"> GIAO HÀNG TOÀN QUỐC</div>
                        <div class="tit-color"></div>
                        <div class="descrip">Chuyển phát nhanh toàn quốc </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection



@section('footer')
    @include('Web.footer')
@endsection
