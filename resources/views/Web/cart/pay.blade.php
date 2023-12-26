@include('Web.cart.css')


<div class="banner">
    <div class="wrap">
        <a href="/" class="logo">


            <h1 class="logo-text">SmartHomePlus Việt Nam - Thiết bị điện thông minh</h1>

        </a>
    </div>
</div>


<div class="content">
    @php
    $total = 0; // Khởi tạo biến total
    @endphp

    <div class="wrap">
        <form class="bg0 p-t-75 p-b-85" method="post" action="/donhang">
            <div class="sidebar">
                <div class="sidebar-content">
                    <div class="order-summary order-summary-is-collapsed">
                        <h2 class="visually-hidden">Thông tin đơn hàng</h2>
                        <div class="order-summary-sections">
                            <div class="order-summary-section order-summary-section-product-list" data-order-summary-section="line-items">

                                <table class="product-table">
                                    <thead>
                                        <tr>
                                            <th scope="col"><span class="visually-hidden">Hình ảnh</span></th>
                                            <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                            <th scope="col"><span class="visually-hidden">Số lượng</span></th>
                                            <th scope="col"><span class="visually-hidden">Giá</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($productItem as $item)
                                        @php
                                        $price = $item->price;
                                        $priceEnd = $price *$carts[ $item->id];
                                        $total += $priceEnd;
                                        @endphp
                                        <tr class="product" data-product-id="1051097663" data-variant-id="1114917603">
                                            <td class="product-image">
                                                <div class="product-thumbnail">
                                                    <div class="product-thumbnail-wrapper">
                                                        @if ($item->firstImage)
                                                        <img class="product-thumbnail-image" alt="Camera Wifi Ngoài Trời Tuya Độ Phân Giải Cao 4M Chống Nước IP65 Hỗ Trợ 2 Băng Tần 2.4Ghz Và 5.0Ghz SHP-CI3" src="{{ "/images/" . $item->firstImage->name }}" />
                                                        @endif
                                                    </div>
                                                    <span class="product-thumbnail-quantity" aria-hidden="true">
                                                        {{$carts[$item->id]}}
                                                    </span>

                                                    <input class="mtext-104 cl3 txt-center num-product" type="hidden" name="num-product1[{{$item->id}}]" value=" {{$carts[$item->id]}}">
                                                </div>
                                            </td>
                                            <td class="product-description">
                                                <span class="product-description-name order-summary-emphasis">{{ $item->name}}</span>

                                                <span class="product-description-variant order-summary-small-text">
                                                    12 tháng
                                                </span>

                                            </td>
                                            <td class="product-quantity visually-hidden">1</td>
                                            <td class="product-price">
                                                <span class="order-summary-emphasis">{{number_format($price,0,'','.')}}
                                                    đ</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>





                            <div class="order-summary-section order-summary-section-total-lines payment-lines" data-order-summary-section="payment-lines">
                                <table class="total-line-table">
                                    <thead>
                                        <tr>
                                            <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                            <th scope="col"><span class="visually-hidden">Giá</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="total-line total-line-subtotal">
                                            <td class="total-line-name">Tạm tính</td>
                                            <td class="total-line-price">
                                                <span class="order-summary-emphasis" data-checkout-subtotal-price-target="119000000">
                                                    {{number_format($total,0,'','.')}} đ
                                                </span>
                                            </td>
                                        </tr>


                                        <tr class="total-line total-line-shipping">

                                            <td class="total-line-price">

                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="total-line-table-footer">
                                        <tr class="total-line">
                                            <td class="total-line-name payment-due-label">
                                                <span class="payment-due-label-total">Tổng cộng</span>
                                            </td>
                                            <td class="total-line-name payment-due">
                                                <span class="payment-due-currency">VND</span>
                                                <span class="payment-due-price" data-checkout-payment-due-target="119000000">
                                                    {{number_format($total,0,'','.')}} đ
                                                </span>
                                                <span class="checkout_version" display:none data_checkout_version="2">
                                                </span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main">
                <div class="main-header">

                    <a href="/" class="logo">

                        <h1 class="logo-text">Trường Đức - Thiết bị điện thông minh</h1>

                    </a>

                    <style>
                        a.logo {
                            display: block;
                        }

                        .logo-cus {
                            width: 100%;
                            padding: 15px 0;
                            text-align: 4
                        }

                        .logo-cus img {
                            max-height: 4.2857142857em
                        }

                        .logo-text {
                            text-align: 5
                        }

                        @media (max-width: 767px) {
                            .banner a {
                                display: block;
                            }
                        }
                    </style>


                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/carts">Giỏ hàng</a>
                        </li>

                        <li class="breadcrumb-item breadcrumb-item-current">
                            Thông tin giao hàng
                        </li>

                    </ul>

                </div>
                <div class="main-content">





                    <div class="step">

                        <div class="step-sections steps-onepage" step="1">



                            <div class="section">
                                <div class="section-header">
                                    <h2 class="section-title">Thông tin giao hàng</h2>
                                </div>
                                <div class="section-content section-customer-information no-mb">


                                    <div class="fieldset">


                                        <div class="field field-required  ">
                                            <div class="field-input-wrapper">
                                                <label class="field-label" for="billing_address_full_name">Họ và
                                                    tên</label>
                                                <input placeholder="Họ và tên" autocapitalize="off" spellcheck="false" class="field-input" size="30" type="text" id="billing_address_full_name" name="name" value="" autocomplete="false" />
                                            </div>

                                        </div>



                                        <div class="field field-required field-two-thirds  ">
                                            <div class="field-input-wrapper">
                                                <label class="field-label" for="checkout_user_email">Email</label>
                                                <input autocomplete="false" placeholder="Email" autocapitalize="off" spellcheck="false" class="field-input" size="30" type="email" id="checkout_user_email" name="email" value="" />
                                            </div>

                                        </div>



                                        <div class="field field-required field-third  ">
                                            <div class="field-input-wrapper">
                                                <label class="field-label" for="billing_address_phone">Số điện
                                                    thoại</label>
                                                <input autocomplete="false" placeholder="Số điện thoại" autocapitalize="off" spellcheck="false" class="field-input" size="30" maxlength="15" type="tel" id="billing_address_phone" name="phone" value="" />
                                            </div>

                                        </div>


                                    </div>
                                </div>
                                <div class="section-content">
                                    <div class="fieldset">

                                        <form autocomplete="off" id="form_update_shipping_method" class="field default" accept-charset="UTF-8" method="post">
                                            <input name="utf8" type="hidden" value="✓">
                                            <div class="content-box mt0">

                                                <div id="form_update_location_customer_shipping" class="order-checkout__loading radio-wrapper content-box-row content-box-row-padding content-box-row-secondary " for="customer_pick_at_location_false">
                                                    <input name="utf8" type="hidden" value="✓">
                                                    <div class="order-checkout__loading--box">
                                                        <div class="order-checkout__loading--circle"></div>
                                                    </div>

                                                    <div class="field field-required  ">
                                                        <div class="field-input-wrapper">
                                                            <label class="field-label" for="billing_address_address1">Địa
                                                                chỉ</label>
                                                            <input placeholder="Địa chỉ" autocapitalize="off" spellcheck="false" class="field-input" size="30" type="text" id="billing_address_address1" name="address" value="" />
                                                        </div>

                                                    </div>

                                                    <div class="field field-show-floating-label field-required field-half ">
                                                        <div class="field-input-wrapper field-input-wrapper-select">
                                                            <label class="field-label" for="customer_shipping_province">
                                                                Tỉnh / thành </label>
                                                            <select class="field-input" id="customer_shipping_province" name="province">
                                                                <option data-code="null" value="null" selected>

                                                                    Chọn tỉnh / thành </option>



                                                                <option data-code="HC" value="Hồ Chí Minh">Hồ Chí Minh
                                                                </option>



                                                                <option data-code="HI" value="Hà Nội">Hà Nội</option>



                                                                <option data-code="DA" value="Đà Nẵng">Đà Nẵng</option>



                                                                <option data-code="AG" value="An Giang">An Giang
                                                                </option>



                                                                <option data-code="BV" value="Bà Rịa - Vũng Tàu">Bà Rịa
                                                                    - Vũng Tàu
                                                                </option>



                                                                <option data-code="BI" value="Bình Dương">Bình Dương
                                                                </option>



                                                                <option data-code="BP" value="Bình Phước">Bình Phước
                                                                </option>



                                                                <option data-code="BU" value="Bình Thuận">Bình Thuận
                                                                </option>



                                                                <option data-code="BD" value="Bình Định">Bình Định
                                                                </option>



                                                                <option data-code="BL" value="Bạc Liêu">Bạc Liêu
                                                                </option>



                                                                <option data-code="BG" value="Bắc Giang">Bắc Giang
                                                                </option>



                                                                <option data-code="BK" value="Bắc Kạn">Bắc Kạn</option>



                                                                <option data-code="BN" value="Bắc Ninh">Bắc Ninh
                                                                </option>



                                                                <option data-code="BT" value="Bến Tre">Bến Tre</option>



                                                                <option data-code="CB" value="Cao Bằng">Cao Bằng
                                                                </option>



                                                                <option data-code="CM" value="Cà Mau">Cà Mau</option>



                                                                <option data-code="CN" value="Cần Thơ">Cần Thơ</option>



                                                                <option data-code="GL" value="Gia Lai">Gia Lai</option>



                                                                <option data-code="HG" value="Hà Giang">Hà Giang
                                                                </option>



                                                                <option data-code="HM" value="Hà Nam">Hà Nam</option>



                                                                <option data-code="HT" value="Hà Tĩnh">Hà Tĩnh</option>



                                                                <option data-code="HO" value="Hòa Bình">Hòa Bình
                                                                </option>



                                                                <option data-code="HY" value="Hưng Yên">Hưng Yên
                                                                </option>



                                                                <option data-code="HD" value="Hải Dương">Hải Dương
                                                                </option>



                                                                <option data-code="HP" value="Hải Phòng">Hải Phòng
                                                                </option>



                                                                <option data-code="HU" value="Hậu Giang">Hậu Giang
                                                                </option>



                                                                <option data-code="KH" value="Khánh Hòa">Khánh Hòa
                                                                </option>



                                                                <option data-code="KG" value="Kiên Giang">Kiên Giang
                                                                </option>



                                                                <option data-code="KT" value="Kon Tum">Kon Tum</option>



                                                                <option data-code="LI" value="Lai Châu">Lai Châu
                                                                </option>



                                                                <option data-code="LA" value="Long An">Long An</option>



                                                                <option data-code="LO" value="Lào Cai">Lào Cai</option>



                                                                <option data-code="LD" value="Lâm Đồng">Lâm Đồng
                                                                </option>



                                                                <option data-code="LS" value="Lạng Sơn">Lạng Sơn
                                                                </option>



                                                                <option data-code="ND" value="Nam Định">Nam Định
                                                                </option>



                                                                <option data-code="NA" value="Nghệ An">Nghệ An</option>



                                                                <option data-code="NB" value="Ninh Bình">Ninh Bình
                                                                </option>



                                                                <option data-code="NT" value="Ninh Thuận">Ninh Thuận
                                                                </option>



                                                                <option data-code="PT" value="Phú Thọ">Phú Thọ</option>



                                                                <option data-code="PY" value="Phú Yên">Phú Yên</option>



                                                                <option data-code="QB" value="Quảng Bình">Quảng Bình
                                                                </option>



                                                                <option data-code="QM" value="Quảng Nam">Quảng Nam
                                                                </option>



                                                                <option data-code="QG" value="Quảng Ngãi">Quảng Ngãi
                                                                </option>



                                                                <option data-code="QN" value="Quảng Ninh">Quảng Ninh
                                                                </option>



                                                                <option data-code="QT" value="Quảng Trị">Quảng Trị
                                                                </option>



                                                                <option data-code="ST" value="Sóc Trăng">Sóc Trăng
                                                                </option>



                                                                <option data-code="SL" value="Sơn La">Sơn La</option>



                                                                <option data-code="TH" value="Thanh Hóa">Thanh Hóa
                                                                </option>



                                                                <option data-code="TB" value="Thái Bình">Thái Bình
                                                                </option>



                                                                <option data-code="TY" value="Thái Nguyên">Thái Nguyên
                                                                </option>



                                                                <option data-code="TT" value="Thừa Thiên Huế">Thừa Thiên
                                                                    Huế
                                                                </option>



                                                                <option data-code="TG" value="Tiền Giang">Tiền Giang
                                                                </option>



                                                                <option data-code="TV" value="Trà Vinh">Trà Vinh
                                                                </option>



                                                                <option data-code="TQ" value="Tuyên Quang">Tuyên Quang
                                                                </option>



                                                                <option data-code="TN" value="Tây Ninh">Tây Ninh
                                                                </option>



                                                                <option data-code="VL" value="Vĩnh Long">Vĩnh Long
                                                                </option>



                                                                <option data-code="VT" value="Vĩnh Phúc">Vĩnh Phúc
                                                                </option>



                                                                <option data-code="YB" value="Yên Bái">Yên Bái</option>



                                                                <option data-code="DB" value="Điện Biên">Điện Biên
                                                                </option>



                                                                <option data-code="DC" value="Đắk Lắk">Đắk Lắk</option>



                                                                <option data-code="DO" value="Đắk Nông">Đắk Nông
                                                                </option>



                                                                <option data-code="DN" value="Đồng Nai">Đồng Nai
                                                                </option>



                                                                <option data-code="DT" value="Đồng Tháp">Đồng Tháp
                                                                </option>



                                                            </select>
                                                        </div>


                                                    </div>


                                                    <!-- <div id="div_location_country_not_vietnam"
                                                        class="section-customer-information ">
                                                        <div class="field field-two-thirds">
                                                            <div class="field-input-wrapper">
                                                                <label class="field-label"
                                                                    for="billing_address_city">Thành
                                                                    phố</label>
                                                                <input placeholder="Thành phố" autocapitalize="off"
                                                                    spellcheck="false" class="field-input" size="30"
                                                                    type="text" id="billing_address_city"
                                                                    name="billing_address[city]" value="" />
                                                            </div>
                                                        </div>

                                                    </div> -->
                                                </div>

                                            </div>
                                        </form>

                                    </div>

                                </div>
                                <div id="change_pick_location_or_shipping">





                                    <div id="section-payment-method" class="section">
                                        <div class="order-checkout__loading--box">
                                            <div class="order-checkout__loading--circle"></div>
                                        </div>
                                        <div class="section-header">
                                            <h2 class="section-title">Phương thức thanh toán</h2>
                                        </div>
                                        <div class="section-content">
                                            <div class="content-box">



                                                <div class="radio-wrapper content-box-row">
                                                    <label class="radio-label" for="payment_method_id_436765">
                                                        <div class="radio-input payment-method-checkbox">
                                                            <input type-id='1' id="payment_method_id_436765" class="input-radio" name="payment_method_id" type="radio" value="436765" checked />
                                                        </div>
                                                        <div class='radio-content-input'>
                                                            <img class='main-img' src="https://hstatic.net/0/0/global/design/seller/image/payment/cod.svg?v=6" />
                                                            <div>
                                                                <span class="radio-label-primary">Thanh toán khi giao
                                                                    hàng
                                                                    (COD)</span>
                                                                <span class='quick-tagline hidden'></span>


                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>

                                                <div class="radio-wrapper content-box-row content-box-row-secondary " for="payment_method_id_436765">
                                                    <div class="blank-slate">
                                                        Chúng tôi sẽ liên lạc lại với quý khách hàng để xác nhận đơn
                                                        hàng
                                                        ,quý khách hàng lưu ý điện thoại để nhận được phản hồi sớm nhất
                                                        về
                                                        đơn hàng quý khách đã đặt.
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>



                        </div>
                        <div class="step-footer" id="step-footer-checkout">



                            <input name="utf8" type="hidden" value="✓">
                            <button type="submit" class="step-footer-continue-btn btn">
                                <span class="btn-content">Hoàn tất đơn hàng</span>
                                <i class="btn-spinner icon icon-button-spinner"></i>
                            </button>

                            @csrf
        </form>
        <a class="step-footer-previous-link" href="/carts">
            Giỏ hàng
        </a>



    </div>
</div>

</div>

<div class="hrv-coupons-popup-site-overlay"></div>
<div class="main-footer footer-powered-by">Powered by Truong Duc</div>
</div>
</form>
</div>

</div>





</div>