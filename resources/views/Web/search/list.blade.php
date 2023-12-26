@extends('Web.main')

@section('content')



<div class="container-mp nav-wrapper">




    <div class="scroller">
        <div class="scroller-inner">



            <section id="content" class="clearfix container">





                @include('Web.sidebar')



                <div class="col-md-9 col-xs-12 col-sm-12" id="layout-page">
                    <span class="header-search header-page clearfix">
                        <h1>Tìm kiếm</h1>
                    </span>



                    <!-- <div class="content-page" id="search">
                        <div class="col-md-12 expanded-message">
                            <div class="search-field">
                                <form id="search-form" action="/search/{{ $search }}" method="GET">
                                    <input type="submit" alt="Go" id="go" />
                                    <input type="text" name="q" class="search_box" placeholder="Tìm kiếm"
                                        value="{{$search}}" />
                                </form>
                            </div>
                        </div>
                    </div> -->


                    @if(!empty($itemSearch))
                    <div class="search-results" style="margin-left: 5px;">
                        <h2>Kết quả tìm kiếm cho: {{$search}}</h2>
                        <ul>
                            @foreach($itemSearch as $item)
                            <form action="/add-cart" method="POST">
                                <div class="col-md-3 col-sm-6 col-xs-6 pro-loop">
                                    <div class="product-block product-resize">
                                        @if ($item['firstImage'])
                                        <div class="product-img image-resize view view-third clearfix">
                                            <a href="/sanpham/detail/{{ $item['product']->id}}-{{ Str::slug( $item['product']->name, '-') }}.html"
                                                title="{{$item['firstImage']->name}}">
                                                <img alt="aaa" src="{{ "/images/" . $item['firstImage']->name }}" />
                                            </a>
                                        </div>
                                        @endif
                                        <div class="product-detail clearfix">
                                            <p class="pro-price"> {{number_format( $item['product']->price,0,'','.')}} đ
                                            </p>
                                            <p class="pro-price-del text-left"></p>
                                            <h3 class="pro-name">
                                                <a href="/sanpham/detail/{{ $item['product']->id}}-{{ Str::slug( $item['product']->name, '-') }}.html"
                                                    title="{{ $item['product']->name}}">
                                                    {{ $item['product']->name }}
                                                </a>
                                            </h3>
                                            <input id="quantity" type="hidden" name="quantity" min="1" value="1"
                                                class="tc item-quantity" />

                                            <div class="add-cart">


                                                <input type="hidden" name="id" value="{{ $item['product']->id}}">
                                                <button type="submit" title="{{ $item['product']->name}}"
                                                    style="border: none; background: none; padding: 0; margin: 0;">
                                                    <img class="add-cart-img"
                                                        src="https://theme.hstatic.net/1000162838/1000469515/14/add-cart.png?v=657"
                                                        alt="cart">
                                                </button>




                                                <input type="hidden" name="product_id"
                                                    value="{{ $item['product']->id}}">

                                            </div>


                                        </div>
                                    </div>
                                </div>
                                @csrf

                            </form>
                            @endforeach
                        </ul>
                    </div>
                    @else
                    <p style="margin-left: 50px;">Không tìm thấy kết quả cho: {{$search}}</p>
                    @endif

                    <style>
                    div#search {
                        float: left;
                        width: 100%;
                        outline: none;
                    }

                    .search-field {
                        width: 100% !important;
                    }

                    input#go {
                        width: 34px !important;
                        height: 34px !important;
                        float: right !important;
                        background: url(https://hstatic.net/0/0/global/design/theme-default/icon-search.png) #1475bc center no-repeat;
                        margin: 0px !important;
                        font-size: 0px;
                        position: relative !important;
                        top: 0px !important;
                    }

                    #search .search_box {
                        width: calc(100% - 34px) !important;
                        float: left;
                        outline: none;
                        padding: 0px 0px 0px 10px;
                    }
                    </style>




            </section>

            @endsection



            @section('footer')
            @include('Web.footer')
            @endsection