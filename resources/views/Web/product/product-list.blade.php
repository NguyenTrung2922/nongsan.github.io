@extends('Web.main')

@section('content')



<div class="container-mp nav-wrapper">




    <div class="scroller">
        <div class="scroller-inner">



            <section id="content" class="clearfix container">





                @include('Web.sidebar')


                <h1 class="hidden">Tấn Phong - Thiết bị điện thông minh</h1>

                <div class="col-md-9 col-sm-12 col-xs-12">
                    <!-- Content-->
                    <div class="main-content">

                        <!-- Sản phẩm trang chủ -->

                        <div class="product-list clearfix ">



                            <div class="main-content">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5  ">
                                    <ol class="breadcrumb breadcrumb-arrow hidden-sm hidden-xs">
                                        <li><a href="/" target="_self">Trang chủ</a></li>


                                        <!-- <li><a href="../collections.html" target="_self">Danh mục</a></li> -->



                                        <li class="active"><span>{{$displaySlug}}</span></li>


                                    </ol>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <h1>
                                                {{$displaySlug}}
                                            </h1>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">


                                            <div class="browse-tags">

                                                <span class="custom-dropdown custom-dropdown--white">
                                                    <select
                                                        class="sort-by custom-dropdown__select custom-dropdown__select--white">
                                                        <option value="manual">Bộ lọc</option>
                                                        <option value="price-ascending">Giá: Tăng dần</option>
                                                        <option value="price-descending">Giá: Giảm dần</option>
                                                        <option value="title-ascending">Tên: A-Z</option>
                                                        <option value="title-descending">Tên: Z-A</option>
                                                        <option value="created-ascending">Cũ nhất</option>
                                                        <option value="created-descending">Mới nhất</option>

                                                    </select>
                                            </div>

                                            <!-- <div class="browse-tags">
                                                <span>Sắp xếp theo:</span>

                                                <span class="custom-dropdown custom-dropdown--white">
                                                    <form name="sortProducts" id="sortProducts">
                                                        <input type="hidden" name="url" id="url"
                                                            value="{{$displaySlug}}" />
                                                        <select
                                                            class="sort-by custom-dropdown__select custom-dropdown__select--white"
                                                            name="sort" id="sort">
                                                            <option value="manual">Sản phẩm nổi bật</option>
                                                            <option value="price-ascending">Giá: Tăng dần</option>
                                                            <option value="price-descending">Giá: Giảm dần</option>
                                                            <option value="title-ascending">Tên: A-Z</option>
                                                            <option value="title-descending">Tên: Z-A</option>
                                                            <option value="created-ascending">Cũ nhất</option>
                                                            <option value="created-descending">Mới nhất</option>

                                                        </select>
                                                    </form>
                                            </div> -->

                                        </div>
                                    </div>
                                </div>




                                <div class="col-md-12 product-list" id="product-list">

                                    <div class="row content-product-list" style="margin-top: 20px;">
                                        @foreach($products as $post)

                                        <div class="col-md-3 col-sm-6 col-xs-6 pro-loop">
                                            <form action="/add-cart" method="POST">
                                                <div class="product-block product-resize">
                                                    <div class="product-img image-resize view view-third clearfix">


                                                        @if ($post->firstImage)
                                                        <a href="/detail/{{$post->id}}-{{ Str::slug($post->name, '-') }}.html"
                                                            title="Aptomat Cầu Dao Tổng Bảo Vệ Quá Áp, Thấp Áp, Quá Dòng, Rò Dòng Điều Khiển Qua Wifi ZigBee Tuya SHP-IO1v3">
                                                            <img alt="{{ $post->firstImage->name}}"
                                                                src="{{ "/images/" . $post->firstImage->name }}"
                                                                alt="{{ $post->firstImage->name}}" />
                                                        </a>
                                                        @endif

                                                    </div>

                                                    <div class="product-detail clearfix">


                                                        <!-- sử dụng pull-left -->
                                                        <p class="pro-price">{{number_format($post->price,0,'','.')}} đ
                                                        </p>
                                                        <p class="pro-price-del text-left">
                                                            </h3>
                                                        <h3 class="pro-name"><a
                                                                href="/detail/{{$post->id}}-{{ Str::slug($post->name, '-') }}.html"
                                                                title="Aptomat Cầu Dao Tổng Bảo Vệ Quá Áp, Thấp Áp, Quá Dòng, Rò Dòng Điều Khiển Qua Wifi ZigBee Tuya SHP-IO1v3">
                                                                {{$post->name}}
                                                            </a></h3>

                                                        <input id="quantity" type="hidden" name="quantity" min="1"
                                                            value="1" class="tc item-quantity" />
                                                        <div class="add-cart">



                                                            <button type="submit" title="{{$post->name }}"
                                                                style="border: none; background: none; padding: 0; margin: 0;">
                                                                <img class="add-cart-img"
                                                                    src="https://theme.hstatic.net/1000162838/1000469515/14/add-cart.png?v=657"
                                                                    alt="cart">
                                                            </button>




                                                            <input type="hidden" name="product_id"
                                                                value="{{$post->id}}">

                                                        </div>


                                                    </div>
                                                </div>
                                                @csrf
                                            </form>
                                        </div>

                                        @endforeach

                                    </div>

                                </div>
                                <!-- End sản phẩm trang chủ -->
                            </div>
                            <!-- Content-->
                        </div>

                        <div class="col-md-12 ">
                            {{ $products->withQueryString()->links('pagination::bootstrap-4') }}

                        </div>
                    </div>
                </div>


                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const selectElement = document.querySelector('.sort-by');

                    selectElement.addEventListener('change', function(event) {
                        event.preventDefault();

                        const selectedValue = this.value;

                        const url = new URL(window.location.href);
                        url.searchParams.set('sort_by', selectedValue);
                        window.location.href = url.href;
                        console.log('Selected Value:', selectedValue);
                    });
                });
                </script>


                <script>
                $(document).ready(function() {
                    $('sort').on('change', function() {
                        console.log(123);
                    })
                })
                </script>


            </section>

            @endsection



            @section('footer')
            @include('Web.footer')
            @endsection