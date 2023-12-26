@extends('Web.main')

@section('content')


<div class="container-mp nav-wrapper">

    <!--End: Bài viết mới nhất-->


    <div class="col-md-12 col-sm-12 col-xs-12 article">
        <div class="main-content">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5 blog-breadcrumb ">
                <ol class="breadcrumb breadcrumb-arrow hidden-sm hidden-xs">
                    <li><a href="/" target="_self">Trang chủ</a></li>


                    <li><a href="/tintuc/Tin tức">Blog - Tin tức</a></li>

                    <li class="active"><span>{{$postObject->name}}</span></li>

                </ol>
            </div>

            <div class="article-body">
                <div class="col-md-9 articles clearfix" id="layout-page">
                    <span class="header-page clearfix">
                        <h1>{{$postObject->name}}</h1>
                    </span>

                    <div class="content-page row">
                        <div class="col-md-2">
                            <!--Begin:ngày giờ đăng bài viết  -->
                            <div class="author-date">
                                <ul class="date-post">
                                    <li>
                                        <i class="icon-time"></i>
                                        <p>
                                            {{$postObject->date}}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <!--End:ngày giờ đăng bài viết  -->

                            <!--Begin: số bình luận  -->

                            <!--End: số đăng bình luận   -->
                        </div>

                        <div class="col-md-10 article-content">

                            <div class="body-content">
                                {!! $postObject->content !!}
                                <div style="float: right">{{$postObject->author}}</div>
                            </div>

                        </div>

                    </div>

                </div>
                <!-- End article-->


                <!-- Begin sidebar -->
                <div class="col-md-3 clearfix">
                    <div class="sidebar">

                        <!-- Begin: Danh mục tin tức -->
                        <div class="news-menu list-group">
                            <span class="list-group-item active">Danh mục blog</span>
                            <ul class="nav sidebar" id="menu-blog">

                                <li class="active"><a href="/tintuc/Tin tức">{{$postObject->category}}</a></li>

                            </ul>
                            <script>
                                $(document).ready(function() {
                                    //$('ul li:has(ul)').addClass('hassub');
                                    $('#menu-blog ul ul li:odd').addClass('odd');
                                    $('#menu-blog ul ul li:even').addClass('even');
                                    $('#menu-blog > ul > li > a').click(function() {
                                        $('#menu-blog li').removeClass('active');
                                        $(this).closest('li').addClass('active');
                                        var checkElement = $(this).nextS();
                                        if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
                                            $(this).closest('li').removeClass('active');
                                            checkElement.slideUp('normal');
                                        }
                                        if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
                                            $('#menu-blog ul ul:visible').slideUp('normal');
                                            checkElement.slideDown('normal');
                                        }
                                        if ($(this).closest('li').find('ul').children().length == 0) {
                                            return true;
                                        } else {
                                            return false;
                                        }
                                    });

                                    $('.drop-down-1').click(function(e) {
                                        if ($(this).parents('li').hasClass('has-sub')) {
                                            e.preventDefault();
                                            if ($(this).hasClass('open-nav')) {
                                                $(this).removeClass('open-nav');
                                                $(this).parents('li').children('ul.lve2-blog').slideUp(
                                                    'normal').removeClass('in');
                                            } else {
                                                $(this).addClass('open-nav');
                                                $(this).parents('li').children('ul.lve2-blog').slideDown(
                                                    'normal').addClass('in');
                                            }
                                        } else {

                                        }
                                    });

                                });

                                $(".news-menu  ul.navs li.active").parents('ul.children').addClass("in");
                            </script>
                        </div>
                        <!-- End: Danh mục tin tức -->






                        <!--Begin: Bài viết mới nhất-->
                        <div class="news-latest list-group">
                            <span class="list-group-item active">
                                Bài viết mới nhất
                            </span>
                            @if($newpost)
                            @foreach($newpost as $new)
                            <div class="article">

                                <div class="col-ld-3 col-md-3 col-sm-4 col-xs-4">
                                    <a href="/tintuc/detail/{{$new->id}}-{{ Str::slug($new->name, '-') }}.html"><img src="{{ "/storage/" . $new->thumb }}" alt="{{$new->name}}" /></a>
                                </div>

                                <div class="post-content col-lg-9 col-md-9 col-sm-8 col-xs-8 ">
                                    <a href="/tintuc/detail/{{$new->id}}-{{ Str::slug($new->name, '-') }}.html">{{$new->name}}</a><span class="date"> <i class="time-date"></i>{{$new->date}}</span>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <!--End: Bài viết mới nhất-->





                    </div>
                    <!-- End sidebar -->
                </div>
            </div>


        </div>
    </div>
</div>


</section>



<!--Scroll to Top-->

<a href="#" class="scrollToTop">
    <i class="fa fa-chevron-up"></i>
</a>


<div class="cs_muahang" style="clear: both;">



</div>








</section>

@endsection



@section('footer')
@include('Web.footer')
@endsection