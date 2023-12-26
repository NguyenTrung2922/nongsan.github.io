<button type="button" class="navbar-toggle btn-sidebar" id="trigger">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</button>
<nav id="mp-menu" class="mp-menu">
    <div class="mp-level">
        <ul class="lv1">


            <li><a href="/">Trang chủ</a></li>


            @foreach($category as $item)
            <li class="has-children icon icon-arrow-left">
                <a href="/sanpham/{{$item->slug}}/{{$item->id}}">{{ $item->name }}</a>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <div class="mp-level">
                    <h2>{{ $item->name }}</h2>
                    <a class="mp-back" href="#">Quay lại</a>
                    @if($item->categoryChildrent && $item->categoryChildrent->count() > 0)
                    <ul class="cd-secondary-nav count-nav-30">
                        @foreach($item->categoryChildrent as $children)
                        @if($children->categoryChildrent && $children->categoryChildrent->count() > 0)
                        <li class="has-children icon icon-arrow-left">
                            <a href="/sanpham/{{$children->slug}}/{{$children->id}}">{{ $children->name }}</a>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <div class="mp-level">
                                <h2>{{ $children->name }}</h2>
                                <a class="mp-back" href="#">Quay lại</a>
                                <ul>
                                    @foreach($children->categoryChildrent as $childrenGrand)
                                    <li><a
                                            href="/sanpham/{{$childrenGrand->name}}/{{$childrenGrand->id}}">{{ $childrenGrand->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        @else
                        <li>
                            <a href="/sanpham/Tất cả sản phẩm">{{ $children->name }}</a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                    @endif
                </div>
            </li>
            @endforeach




            <li class="has-children icon icon-arrow-left">
                <a href="{{ url('/chinhsach/' . Str::slug('Chính sách')) }}">Chính Sách</a>

                <i class="fa fa-angle-right" aria-hidden="true"></i>

                <div class="mp-level">
                    <h2>Chính Sách</h2>
                    <a class="mp-back" href="#">Quay lại</a>
                    <ul class="cd-secondary-nav count-nav-7">


                        <li><a href="{{ url('/chinhsach/' . Str::slug('Chính sách vận chuyển')) }}">CHÍNH SÁCH VẬN
                                CHUYỂN</a>
                        </li>



                        <li><a href="{{ url('/chinhsach/' . Str::slug('Chính sách đổi trả')) }}">CHÍNH SÁCH ĐỔI TRẢ</a>
                        </li>



                        <li><a href="{{ url('/chinhsach/' . Str::slug('Chính sách bảo mật')) }}">CHÍNH SÁCH BẢO MẬT</a>
                        </li>



                        <li><a href="{{ url('/chinhsach/' . Str::slug('chinhsachdaily')) }}">CHÍNH SÁCH ĐẠI LÝ</a></li>



                        <li><a href="{{ url('/chinhsach/' . Str::slug('Phương thức thanh toán')) }}">PHƯƠNG THỨC THANH
                                TOÁN</a>
                        </li>



                        <li><a href="{{ url('/chinhsach/' . Str::slug('Thông tin chuyển khoản')) }}">THÔNG TIN CHUYỂN
                                KHOẢN</a>
                        </li>



                        <li><a href="{{ url('/chinhsach/' . Str::slug('Hướng dẫn mua hàng')) }}">HƯỚNG DẪN MUA HÀNG</a>
                        </li>


                    </ul>
                </div>
            </li>



            <li><a href="{{ url('/tintuc/' . Str::slug('Tin tức')) }}">Tin tức</a></li>



            <li><a href="/lien-he">Liên Hệ</a></li>



            <li><a href="{{ url('/huongdanmuahang/' . Str::slug('Hướng dẫn mua hàng')) }}">Hướng dẫn mua hàng</a></li>


        </ul>
    </div>
</nav>

<script>
new mlPushMenu(document.getElementById('mp-menu'), document.getElementById('trigger'), {
    type: 'cover'
});
</script>