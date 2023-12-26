@extends('Web.main')

@section('content')


<section id="content" class="clearfix container">
    @include('Web.sidebar')
    <div id="cart" class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <!-- Begin empty cart -->
        @php
        $total = 0; // Khởi tạo biến total
        @endphp
        @if(count($productGH)!==0)
        <div class="row">
            <div id="layout-page" class="col-md-12">
                <span class="header-page clearfix">
                    <h1>{{$title}}</h1>
                </span>

                <form action="/cart" method="post" id="cartformpage">
                    <table>
                        <thead>
                            <tr>
                                <th class="image">&nbsp;</th>
                                <th class="item">Tên sản phẩm</th>
                                <th class="qty">Số lượng</th>
                                <th class="price">Giá tiền</th>
                                <th class="remove">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productGH as $productGH )
                            @php
                            $price = $productGH->price;
                            $priceEnd = $price *$carts[$productGH->id];
                            $total += $priceEnd;
                            @endphp
                            <tr>
                                <td class="image">
                                    <div class="product_image">
                                        @if ($productGH->firstImage)
                                        <a
                                            href="/sanpham/detail/{{$productGH->id}}-{{ Str::slug($productGH->name, '-') }}.html">
                                            <img src="{{ "/images/" . $productGH->firstImage->name }}" />
                                        </a>
                                        @endif
                                    </div>
                                </td>
                                <td class="item">
                                    <a
                                        href="/sanpham/detail/{{$productGH->id}}-{{ Str::slug($productGH->name, '-') }}.html">
                                        <strong>{{$productGH->name}}</strong>

                                    </a>
                                </td>
                                <td class="qty">
                                    <input type="number" min="1" name="quantity[{{$productGH->id}}]"
                                        value="{{$carts[$productGH->id]}}" onfocus="this.select();"
                                        class="tc item-quantity" />
                                </td>
                                <td class="price"> {{number_format($price,0,'','.')}} đ</td>
                                <td class="remove">
                                    <a href="/carts/delete/{{ $productGH->id }}" class="cart">Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                            <tr class="summary">
                                <td class="image">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td class="text-center"><b>Tổng cộng:</b></td>
                                <td class="price">
                                    <span class="total">
                                        <strong> {{number_format($total,0,'','.')}} đ</strong>
                                    </span>
                                </td>
                                <td>&nbsp;</td>


                            </tr>

                        </tbody>

                    </table>



                    <div class="col-md-6 cart-buttons inner-right inner-left">
                        <div class="buttons clearfix">
                            <button type="submit" id="checkout" class="button-default" name="checkout" value="">
                                <a href="/donhang">
                                    Thanh
                                    toán
                                </a>
                            </button>
                            <button type="submit" class="button-default" name="update" value="update-cart"
                                formaction="/update-cart">Cập
                                nhật</button>
                        </div>
                        @csrf
                    </div>
                    <div class="col-md-12">

                        <a href="/sanpham/{{$category[0]->slug}}/{{$category[0]->id}}">
                            <i class="fa fa-reply"></i> Tiếp tục mua hàng</a>
                    </div>


                </form>


            </div>
        </div>

        @else
        <div class="text-center">
            <h2>Giỏ hàng trống</h2>
        </div>
        @endif

        <!-- End cart -->

    </div>
</section>

<!--Scroll to Top-->

<a href="#" class="scrollToTop">
    <i class="fa fa-chevron-up"></i>
</a>


<div class="cs_muahang" style="clear: both;">



</div>






@endsection



@section('footer')
@include('Web.footer')
@endsection