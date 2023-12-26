@extends('Web.main')

@section('content')

<?php $postList = $postObject['postList'] ?>
<div class="container-mp nav-wrapper">

    <!--End: Bài viết mới nhất-->




    <div class="container-mp nav-wrapper">



        <section id="content" class="clearfix container">




            <div id="blog">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="main-content row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5  ">
                            <ol class="breadcrumb breadcrumb-arrow hidden-sm hidden-xs">
                                <li><a href="/" target="_self">Trang chủ</a></li>



                                <li class="active"><span>Blog - Tin tức</span></li>


                            </ol>
                        </div>
                        <!-- Begin content -->
                        <div class="blog-content col-md-12">
                            <div class="row">
                                <div class="col-md-9" id="blog-container">
                                    <div class="">
                                        <div class="col-md-12 articles clearfix" id="layout-page">
                                            <span class="header-page">
                                                <h1>Tin tức</h1>
                                            </span>

                                            <!-- Begin: Nội dung blog -->
                                            @if($postList && count($postList) > 0)
                                            @foreach($postList as $post)
                                            <div class="news-content">
                                                <div class="col-md-2 hidden-xs hidden-sm">
                                                    <!--Begin:ngày giờ đăng bài viết  -->
                                                    <div class="author-date">
                                                        <ul class="date-post">
                                                            <li>
                                                                <i class="icon-time"></i>
                                                                <p>
                                                                    {{$post->date}}
                                                                </p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!--End:ngày giờ đăng bài viết  -->
                                                    <!--Begin: số bình luận  -->

                                                    <!--End: số đăng bình luận   -->
                                                </div>
                                                <!-- mobile -->

                                                <div class="col-xs-12 col-sm-12 hidden-lg hidden-md">
                                                    <!-- Begin: Nội dung bài viết -->
                                                    <h2 class="title-article"><a
                                                            href="/tintuc/detail/{{$post->id}}-{{ Str::slug($post->name, '-') }}.html">{{$post->name}}</a>
                                                    </h2>
                                                    <div class="body-content">
                                                        <ul class="info-more">
                                                            <li><i class="icon-info icon-hot clearfix"></i>
                                                                <a href="#"> {{$post->category}} </a>
                                                            </li>
                                                            <li><i class="icon-time"></i>
                                                                <p>
                                                                    11/05/2023
                                                                </p>
                                                            </li>


                                                        </ul>

                                                    </div>
                                                    <!-- End: Nội dung bài viết -->
                                                </div>



                                                <div class="col-md-5 col-xs-12 col-sm-12 img-article">
                                                    <div class="art-img">
                                                        <img src="{{ "/storage/" . $post->thumb }}" alt="">
                                                    </div>
                                                </div>


                                                <div class=" col-md-5  hidden-xs hidden-sm">
                                                    <!-- Begin: Nội dung bài viết -->
                                                    <h2 class="title-article"><a
                                                            href="/tintuc/detail/{{$post->id}}-{{ Str::slug($post->name, '-') }}.html">{{$post->name}}</a>
                                                    </h2>
                                                    <div class="body-content">
                                                        <ul class="info-more">
                                                            <li><i class="icon-info icon-hot clearfix"></i>
                                                                <a href="#"> {{$post->category}} </a>
                                                            </li>
                                                        </ul>
                                                        <p>{{$post['short-description']}}
                                                        </p>
                                                    </div>
                                                    <!-- End: Nội dung bài viết -->
                                                    <a class="readmore clear-fix"
                                                        href="/tintuc/detail/{{$post->id}}-{{ Str::slug($post->name, '-') }}.html"
                                                        role="button">Xem
                                                        tiếp <span class="fa fa-angle-double-right"></span></a>
                                                </div>


                                                <div class="col-xs-12 hidden-lg hidden-md">
                                                    <p class="text-mobi-blog">{{$post['short-description']}}</p>

                                                    <a class="readmore clear-fix"
                                                        href="/tintuc/detail/{{$post->id}}-{{ Str::slug($post->name, '-') }}.html"
                                                        role="button">Xem
                                                        tiếp <span class="fa fa-angle-double-right"></span></a>

                                                </div>




                                            </div>
                                            <hr class="line-blog" />


                                            @endforeach

                                            @endif


                                            <!-- End: Nội dung blog -->

                                        </div>
                                        <div class="col-md-12">
                                            <!-- Begin: Phân trang blog -->


                                            {{ $postList->links('pagination::bootstrap-4') }}

                                            <!-- End: Phân trang blog -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 clearfix">
                                    <!-- Begin sidebar blog -->
                                    <div class="sidebar">

                                        <!-- Begin: Danh mục tin tức -->

                                        <div class="news-menu list-group">
                                            <span class="list-group-item active">Danh mục blog</span>
                                            <!-- <ul class="nav sidebar" id="menu-blog">
                                                @foreach($postList as $post)
                                                <li class="active"><a href="/tintuc/Tin tức">{{$post->category}}</a>
                                                </li>
                                                @endforeach
                                            </ul> -->
                                            <ul class="nav sidebar" id="menu-blog">
                                                @php
                                                $seenCategories = [];
                                                @endphp

                                                @foreach($postList as $post)
                                                @if (!in_array($post->category, $seenCategories))
                                                <li class="active"><a
                                                        href="/tintuc/{{$post->category}}">{{$post->category}}</a></li>
                                                @php
                                                $seenCategories[] = $post->category;
                                                @endphp
                                                @endif
                                                @endforeach
                                            </ul>

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
                                                    <a
                                                        href="/tintuc/detail/{{$new->id}}-{{ Str::slug($new->name, '-') }}.html"><img
                                                            src="{{ "/storage/" . $new->thumb }}"
                                                            alt="{{$new->name}}" /></a>
                                                </div>

                                                <div class="post-content col-lg-9 col-md-9 col-sm-8 col-xs-8 ">
                                                    <a
                                                        href="/tintuc/detail/{{$new->id}}-{{ Str::slug($new->name, '-') }}.html">{{$new->name}}</a><span
                                                        class="date"> <i class="time-date"></i>{{$new->date}}</span>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif

                                        </div>
                                        <!--End: Bài viết mới nhất-->





                                    </div>
                                    <!-- End sidebar blog -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End content -->

                </div>

        </section>


    </div>

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