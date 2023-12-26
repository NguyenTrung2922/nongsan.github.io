<div id="myCart" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Bạn có 5 sản phẩm trong giỏ hàng.</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <a aria-hidden="true"></a>
                </button>

            </div>
            @php $total = 0;
            $carts = Session::get('carts');
            @endphp
            <form method="post" id="cartform" style="display: block;">
                <div id="cartModalContent">
                    <div class="modal-body" id="cartModalBody">

                        <table style="width:100%;" id="cart-table">
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá tiền</th>
                                    <th></th>
                                </tr>


                                <tr class="line-item original">
                                    <td class="item-image"></td>
                                    <td class="item-title">
                                        <a></a>
                                    </td>
                                    <td class="item-quantity"></td>
                                    <td class="item-price"></td>
                                    <td class="item-delete"></td>
                                </tr>

                                @if(isset($gio))
                                @foreach($gio as $item)
                                @php
                                $price = $item->price;
                                $priceEnd = $price *$carts[$item->id];
                                $total += $priceEnd;
                                @endphp
                                <tr class="line-item">
                                    <td class="item-image">
                                        @if ($item->firstImage)
                                        <img src="{{ "/images/" . $item->firstImage->name }}" @endif </td>
                                    <td class="item-title">
                                        <a
                                            href="/products/camera-wifi-ngoai-troi-tuya-do-phan-giai-cao-4m-chong-nuoc-ip65-ho-tro-2-bang-tan-2-4ghz-va-5-0ghz-shp-ci3">
                                            {{$item->name}}<br><span>12 tháng</span>
                                        </a>
                                    </td>
                                    <td class="item-quantity">
                                        <input type="number" min="1" name="quantity[{{$item->id}}]"
                                            value="{{$carts[$item->id]}}" onfocus="this.select();"
                                            class="tc item-quantity" />
                                    </td>
                                    <td class="item-price"> {{number_format($price,0,'','.')}}</td>
                                    <td class="item-delete">

                                        <a href="/carts/delete/{{ $item->id }}" class="cart">Xóa
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif

                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-sm-6">

                            </div>
                            <div class="col-sm-6">
                                <div class="total-price-modal">
                                    Tổng cộng : <span class="item-total">
                                        {{number_format($total,0,'','.')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-lg-6">
                                <div class="comeback">
                                    <a href="/collections/all">
                                        <img src="//hstatic.net/0/0/global/design/theme-default/icon-tieptuc.png">Tiếp
                                        tục
                                        mua hàng
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 text-right">
                                <div class="buttons btn-modal-cart">
                                    <button type="submit" class="button-default" id="checkout" name="checkout">
                                        Đặt hàng
                                    </button>
                                </div>

                                <div class="buttons btn-modal-cart">
                                    <button type="button" class="button-default" name="update" value="update-cart">Cập
                                        nhật</button>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

</div>



</div>
<script>
$(document).ready(function() {
    $('#cart-link').click(function() {
        // Hiển thị modal
        $('#myCart').modal('show');
    });
});
</script>