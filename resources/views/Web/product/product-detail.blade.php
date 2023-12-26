@extends('Web.main')

@section('content')

<section id="content" class="clearfix container">



    <div class="container-fuild">


        <div class="col-lg-12">
            <div class="col-lg-9 col-sm-12 col-xs-12 clearfix">
                <div id="wrapper-detail">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <!-- <div id="surround">




                                        <img class="product-image-feature"
                                            src="{{ "/images/" . $postObject->imgPro[0]->name }}"
                                            alt=" Bộ 2 Đèn Đổi Màu RGB Theo Nhạc Thông Minh Wifi Tuya SHP-HUE1"
                                            onclick="openModal('{{ "/images/" . $postObject->imgPro[0]->name }}')">



                                        <div id="sliderproduct" class="">
                                            <ul class="slides">
                                                @foreach($postObject->imgPro as $item)
                                                <li class="product-thumb">
                                                    <a href="javascript:" data-image="{{ "/images/" . $item->name }}"
                                                        data-zoom-image="{{ "/images/" . $item->name }}">
                                                        <img alt="Bộ 2 Đèn Đổi Màu RGB Theo Nhạc Thông Minh Wifi Tuya SHP-HUE1"
                                                            data-image="{{ "/images/" . $item->name }}"
                                                            src="{{ "/images/" . $item->name }}" </a>
                                                </li>
                                                @endforeach



                                            </ul>
                                        </div>



                                    </div> -->
                            <div id="surround">
                                <img class="product-image-feature" id="myImg" src="{{ "/images/" . $postObject->imgPro[0]->name }}" alt=" {{ $postObject->name}}" onclick="openModal('{{ "/images/" . $postObject->imgPro[0]->name }}')">



                                <div id="sliderproduct" class="">
                                    <ul class="slides" onclick="handleSliderClick(event)">
                                        @foreach($postObject->imgPro as $item)
                                        <li class="product-thumb">
                                            <a href="javascript:" data-image="{{ "/images/" . $item->name }}" data-zoom-image="{{ "/images/" . $item->name }}">
                                                <img alt="{{ $item->name}}" data-image="{{ "/images/" . $item->name }}" src="{{ "/images/" . $item->name }}">
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="product-title">
                                <h1>{{$postObject->name}}</h1>

                                <span id="pro_sku">{{$postObject->SKU}}</span>

                            </div>
                            <div class="product-price">
                                <!--id="price-preview"-->
                                <span>{{number_format($postObject->price,0,'','.')}} đ</span>
                            </div>

                            <div id="myModal" class="modal">

                                <!-- The Close Button -->
                                <span class="close">&times;</span>

                                <!-- Modal Content (The Image) -->
                                <img class="modal-content" id="img01">

                                <!-- Modal Caption (Image Text) -->
                                <div id="caption"></div>
                            </div>

                            <form id="add-item-form" action="/add-cart" method="post" class="variants clearfix">
                                <div class="select clearfix" style="margin-top: 20px;">
                                    <div style="margin-bottom: 5px;">Bảo hành</div>
                                    <select id="product-select" name="id">

                                        <option value="1061375146">6 tháng </option>

                                    </select>
                                </div>
                                <div class="short-desc">

                                </div>
                                <div class="select-wrapper ">
                                    <div class="col-quanty">
                                        <label>Số lượng</label>
                                        <input id="quantity" type="number" name="quantity" min="1" value="1" class="tc item-quantity" />
                                    </div>
                                    <div class="col-md-6">
                                        <div class="baohanh">

                                        </div>

                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                        <button type="submit" class=" btn-detail btn-color-add btn-min-width btn-mgt" name="add">
                                            Thêm vào giỏ
                                        </button>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
                                        <button id="buy-now" class=" btn-detail btn-color-buy btn-min-width btn-mgt">
                                            Mua ngay
                                        </button>
                                    </div>
                                    <input type="hidden" name="product_id" value="{{$postObject->id}}">
                                </div>
                                @csrf
                            </form>


                            <div class="pt20">
                                <!-- Begin social icons -->
                                <div class="addthis_toolbox addthis_default_style ">

                                    <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>


                                    <a class="addthis_button_google_plusone" g:plusone:size="medium" g:plusone:count="false"></a>

                                </div>
                                <script type="text/javascript" src="https://s7.addthis.com/js/250/addthis_widget.js">
                                </script>

                                <!-- End social icons -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-10 col-xs-10 clearfix">
                <div class="deliver-top ">
                    <div class="tit-color">SẢN PHẨM ĐẾN TAY BẠN</div>
                    <div class="descrip">Từ 1-5 ngày làm việc</div>
                </div>
                <div class="deliver-top-no deliver-dt" style="padding-left:45px">
                    <a href="">
                        <div class="tit">MIỄN PHÍ VẬN CHUYỂN</div>
                        <div class="descrip">Đơn hàng trên 500.000đ</div>
                    </a>
                </div>
                <div class="deliver-top-no deliver-ch" style="padding-left:45px;background:none !important">
                    <div style="position:absolute;margin-left: -45px;">

                        <img src="https://theme.hstatic.net/1000162838/1000469515/14/icon-day90.png?v=657">

                    </div>
                    <a href="">
                        <div class="tit">CHÍNH SÁCH ĐỔI TRẢ</div>
                        <div class="descrip">Đổi sang sản phẩm khác có giá trị tương đương trong 7 ngày</div>
                    </a>
                </div>
                <div class="deliver-top-no deliver-pay" style="padding-left:45px">
                    <a href="">
                        <div class="tit">THANH TOÁN NHANH </div>
                        <div class="descrip">Thanh toán khi nhận hàng (COD)</div>
                    </a>
                </div>
                <div class="deliver-top-no deliver-phone" style="padding-left:45px">
                    <div class="tit"> GIAO HÀNG TOÀN QUỐC</div>
                    <div class="tit-color"></div>
                    <div class="descrip">Chuyển phát nhanh toàn quốc </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12" style="margin-top:20px;">
                <div role="tabpanel" class="product-comment">
                    <!-- Nav tabs -->
                    <ul class="nav visible-lg visible-md" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#mota">Mô tả sản phẩm</a>
                        </li>

                        <li role="presentation">
                            <a href="#binhluan">Bình luận</a>
                        </li>


                        <li role="presentation">
                            <a href="#like">Sản phẩm khác</a>
                        </li>

                    </ul>
                    <!-- Tab panes -->

                    <div id="mota">

                        <div class="title-bl visible-xs visible-sm">
                            <h2>Mô tả</h2>
                        </div>

                        <div class="container-fluid product-description-wrapper">


                            {!!$postObject->content!!}

                        </div>
                    </div>

                    <div id="binhluan">
                        <div class="title-bl">
                            <h2>Bình luận</h2>
                        </div>
                        <div class="container-fluid">
                            <div id="fb-root"></div>
                            <div class="fb-comments" data-href="https://tanphong.vn/products/bo-2-den-doi-mau-rgb-theo-nhac-thong-minh-wifi-tuya-shp-hue1" data-numposts="5" width="100%" data-colorscheme="light"></div>
                            <!-- script comment fb -->
                            <script type="text/javascript">
                                (function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) return;
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));
                            </script>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top:20px">
                <h3 class="product-recommend-fake">
                    Sản phẩm gợi ý
                </h3>
                <div class="pro-recom-fake">
                    <div id="owl-recom-fake" class="owl-carousel owl-theme">


                        <div class="item">
                            @foreach($smartswitch as $item)
                            <form action="/add-cart" method="POST">
                                <div class="pro-loop">
                                    <div class="product-block product-resize">
                                        <div class="product-img image-resize view view-third clearfix">

                                            <a href="/detail/{{$item->id}}-{{ Str::slug($item->name, '-') }}.html" title="{{$item->name}}">
                                                @if ($item->firstImage1)
                                                <img alt="{{$item->firstImage1->name}}" src="{{ "/images/" . $item->firstImage1->name }}" alt=" {{$item->firstImage1->name}}" />
                                                @endif
                                            </a>
                                        </div>



                                        <div class="product-detail clearfix">


                                            <!-- sử dụng pull-left -->
                                            <p class="pro-price">{{number_format($item->price,0,'','.')}} đ </p>
                                            <p class="pro-price-del text-left">
                                            <h3 class="pro-name"><a href="/detail/{{$item->id}}-{{ Str::slug($item->name, '-') }}.html" title="{{$item->name}}">
                                                    {{$item->name}}
                                                </a></h3>
                                            <input id="quantity" type="hidden" name="quantity" min="1" value="1" class="tc item-quantity" />
                                            <div class="add-cart">



                                                <button type="submit" title="{{$item->name }}" style="border: none; background: none; padding: 0; margin: 0;">
                                                    <img class="add-cart-img" src="https://theme.hstatic.net/1000162838/1000469515/14/add-cart.png?v=657" alt="cart">
                                                </button>




                                                <input type="hidden" name="product_id" value="{{$item->id}}">

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @csrf
                            </form>
                            @endforeach

                        </div>

                    </div>
                </div>



            </div>
        </div>


        <div class="col-md-12 list-like">
            <div id="like">
                <div class="title-like">
                    <h2>Sản phẩm khác</h2>
                </div>









                <div class="row product-list ">
                    <div class="content-product-list">
                        @foreach($productt as $item)
                        <div class="col-md-3 col-sm-6 col-xs-6 pro-loop">
                            <!--sử dụng  -->
                            <form action="/add-cart" method="POST">
                                <div class="product-block product-resize">
                                    <div class="product-img image-resize view view-third clearfix">


                                        <a href="/detail/{{$item->id}}-{{ Str::slug($item->name, '-') }}.html" title="Aptomat Cầu Dao Tổng Bảo Vệ Quá Áp, Thấp Áp, Quá Dòng, Rò Dòng Điều Khiển Qua Wifi ZigBee Tuya SHP-IO1v3">
                                            @if ($item->firstImage)
                                            <img alt="{{$item->firstImage->name }}" src="{{ "/images/" . $item->firstImage->name }}" alt="{{$item->firstImage->name }}" />
                                            @endif
                                        </a>
                                    </div>

                                    <div class="product-detail clearfix">


                                        <!-- sử dụng pull-left -->
                                        <p class="pro-price">{{number_format($item->price,0,'','.')}} đ </p>
                                        <p class="pro-price-del text-left">
                                            </h3>
                                        <h3 class="pro-name"><a href="/detail/{{$item->id}}-{{ Str::slug($item->name, '-') }}.html" title="{{$item->name}}">
                                                {{$item->name}} </a></h3>

                                        <input id="quantity" type="hidden" name="quantity" min="1" value="1" class="tc item-quantity" />
                                        <div class="add-cart">



                                            <button type="submit" title="{{$item->name }}" style="border: none; background: none; padding: 0; margin: 0;">
                                                <img class="add-cart-img" src="https://theme.hstatic.net/1000162838/1000469515/14/add-cart.png?v=657" alt="cart">
                                            </button>




                                            <input type="hidden" name="product_id" value="{{$item->id}}">

                                        </div>

                                    </div>
                                </div>
                                @csrf
                            </form>
                        </div>
                        @endforeach
                    </div>


                </div>



                <script>
                    var add_to_wishlist = function() {
                        if (typeof(Storage) !== "undefined") {
                            if (localStorage.recently_viewed) {

                                if (localStorage.recently_viewed.indexOf(
                                        '1st-birthday-princess-basic-party-kit-18-guests') == -1)
                                    localStorage.recently_viewed =
                                    '1st-birthday-princess-basic-party-kit-18-guests_' + localStorage
                                    .recently_viewed;

                            } else
                                localStorage.recently_viewed =
                                '1st-birthday-princess-basic-party-kit-18-guests';
                        } else {
                            console.log('Your Browser does not support storage!');
                        }
                    }
                </script>

            </div>
        </div>

    </div>

    <div class="clearfix">

    </div>

    <script>
        $(".product-thumb img").click(function() {
            $(".product-thumb").removeClass('active');
            $(this).parents('li').addClass('active');
            $(".product-image-feature").attr("src", $(this).attr("data-image"));
            $(".product-image-feature").attr("data-zoom-image", $(this).attr("data-zoom-image"));
        });

        $(".product-thumb").first().addClass('active');
    </script>

    <script>
        $(document).ready(function() {
            $('#owl-recom-fake').owlCarousel({
                loop: true,
                nav: true,
                items: 1,
                dots: false,
                autoPlay: true,
                autoplayTimeout: 10000,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });
        })
    </script>

    <script>
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>


</section>

@endsection



@section('footer')
@include('Web.footer')
@endsection