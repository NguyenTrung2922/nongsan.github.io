<aside class="col-md-3  hidden-sm hidden-xs">
    <!-- Sidebar menu-->
    <div class="list-group" id="list-group-l">

        <ul class="nav navs sidebar menu" id='cssmenu'>

            <div class="mega-left-title">
                <strong>DANH MỤC SẢN PHẨM </strong>
            </div>

            @foreach($category as $item)
            @if($item->categoryChildrent && $item->categoryChildrent->count() > 0)
            <li class="item first">
                <a href="/sanpham/{{ $item->slug }}/{{ $item->id }}">
                    <span>{{ $item->name }}</span>
                </a>
                @foreach($item->categoryChildrent as $children)
                @if($children->categoryChildrent && $children->categoryChildrent->count() > 0)
                @php
                $subItemId = uniqid('sub-item-');

                @endphp
            <li class="item has-sub">
                <a href='/sanpham/{{$children->slug}}/{{$children->id}}'>
                    <span class="lbl">{{ $children->name }}</span>
                    <span data-toggle="collapse" data-parent="#cssmenu" href="#{{ $subItemId }}" class="sign">
                        <img src="https://hstatic.net/0/0/global/design/theme-default/arrow-down.png">
                    </span>
                </a>
                <ul class="nav children collapse" id="{{ $subItemId }}">
                    @foreach($children->categoryChildrent as $childrenGrand)
                    <li class="first">
                        <a href="/sanpham/{{$childrenGrand->slug}}/{{$childrenGrand->id}}" title="Camera Ip">
                            <span>{{ $childrenGrand->name }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
            @else
            <li class="item">
                <a href="/sanpham/{{$children->slug}}/{{$children->id}}">
                    <span>{{ $children->name }}</span>
                </a>
            </li>
            @endif
            @endforeach
            </li>
            @endif
            @endforeach


        </ul>

    </div>


    <script>
        $(document).ready(function() {
            //$('ul li:has(ul)').addClass('hassub');
            $('#cssmenu ul ul li:odd').addClass('odd');
            $('#cssmenu ul ul li:even').addClass('even');
            $('#cssmenu > ul > li > a').click(function() {
                $('#cssmenu li').removeClass('active');
                $(this).closest('li').addClass('active');
                var checkElement = $(this).nextS();
                if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
                    $(this).closest('li').removeClass('active');
                    checkElement.slideUp('normal');
                }
                if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
                    $('#cssmenu ul ul:visible').slideUp('normal');
                    checkElement.slideDown('normal');
                }
                if ($(this).closest('li').find('ul').children().length == 0) {
                    return true;
                } else {
                    return false;
                }
            });

            $('.drop-down').click(function(e) {
                if ($(this).parents('li').hasClass('has-sub')) {
                    e.preventDefault();
                    if ($(this).hasClass('open-nav')) {
                        $(this).removeClass('open-nav');
                        $(this).parents('li').children('ul.lve2').slideUp('normal')
                            .removeClass('in');
                    } else {
                        $(this).addClass('open-nav');
                        $(this).parents('li').children('ul.lve2').slideDown(
                            'normal').addClass('in');
                    }
                } else {

                }
            });

        });

        $("#list-group-l ul.navs li.active").find('ul.children').addClass("in");
    </script>


    <!-- Sidebar menu-->

    <!-- Support-->
    <div class="sidebar-support list-group">
        <span href="#" class="list-group-item active">

            <img src="https://theme.hstatic.net/1000162838/1000469515/14/avatar-answ.png?v=657" class="img-responsive" />

        </span>
        <h3> Hỗ trợ trực tuyến</h3>
        <div class="support">
            <div class="text-center">
                <a href="#">
                    <img style="width:40px;" src="https://theme.hstatic.net/1000162838/1000469515/14/zalo1.png?v=657" alt="zalo">
                </a>
                <a href="#">
                    <img style="width:40px;    margin-left: 6px;" src="https://theme.hstatic.net/1000162838/1000469515/14/youtube.png?v=657" alt="youtube">
                </a>
                <p>
                    <span class="supp-name">Tư vấn Kỹ thuật</span>
                    <br>
                    <span class="phone">0989 168 262</span>
                </p>


            </div>
            <div class="text-center">

                <span class="supp-name">Số hotline </span>


                <br>
                <p>
                    0989 168 262
                </p>

            </div>
            <div class="text-center">

                <span class="supp-name">Thời gian làm việc </span>

                <p>
                    Làm việc từ 8h - 18h, thứ 2 - thứ 7 các ngày trong tuần
                </p>
            </div>
        </div>
    </div>
    <!-- Support-->

    <!-- Facebook -->


    <!-- Facebook-->
    <!-- Banner quảng cáo -->
    <div class="list-group_l banner-left">

        <a href="#">
            <img src="https://theme.hstatic.net/1000162838/1000469515/14/left_image_ad.jpg?v=657">
        </a>

    </div>
    <!-- Banner quảng cáo -->
    <div class="list-group_1 banner-left">

        <a href="#">
            <img src="https://theme.hstatic.net/1000162838/1000469515/14/left_image_ad_1.jpg?v=657">
        </a>

    </div>
    <!-- Banner quảng cáo -->
    <div class="list-group_2 banner-left">

        <a href="#">
            <img src="https://theme.hstatic.net/1000162838/1000469515/14/left_image_ad_2.jpg?v=657">
        </a>

    </div>
    <!-- Banner quảng cáo -->
    <div class="list-group_2 banner-left">

        <a href="#">
            <img src="https://theme.hstatic.net/1000162838/1000469515/14/left_image_ad_2_2.jpg?v=657">
        </a>

    </div>


    <div class="list-group_2 banner-left">

        <a href="#">
            <img src="https://theme.hstatic.net/1000162838/1000469515/14/left_image_ad_33.jpg?v=657">
        </a>

    </div>


    <div class="list-group_2 banner-left">

        <a href="#">
            <img src="https://theme.hstatic.net/1000162838/1000469515/14/left_image_ad_44.jpg?v=657">
        </a>

    </div>


    <div class="list-group_2 banner-left">

    </div>



    <div class="list-group_2 banner-left">

        <a href="#">
            <img src="https://theme.hstatic.net/1000162838/1000469515/14/left_image_ad_66.jpg?v=657">
        </a>

    </div>
</aside>