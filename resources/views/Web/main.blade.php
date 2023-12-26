<!doctype html>
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang="en"><![endif]-->
<!--[if IE 7]><html class="no-js ie7 oldie" lang="en"><![endif]-->
<!--[if IE 8]><html class="no-js ie8 oldie" lang="en"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    @include('Web.head')

</head>
<body>

    <div class="container-mp nav-wrapper">
        <!-- Begin: wrapper -->
        <div class="wrapper mp-pusher" id="mp-pusher">
            <div>
                @include('Web.menu-mobile')
            </div>
            <div class="scroller">
                <div class="scroller-inner">

                    @include('Web.header')


                    <div>
                        @include('Web.menu')

                    </div>

                    @yield('content')

                    <footer>
                        @yield('footer')
                    </footer>

                </div>

                <!--Scroll to Top-->
                @include('Web.style')
                <a href="#" class="scrollToTop">
                    <i class="fa fa-chevron-up"></i>
                </a>

            </div>
        </div>
    </div>





    <div class='fixed call-button'>
        <a href="tel:0989 168 262">
            <span class='pulse-button'>
                <i class="fa fa-phone" aria-hidden="true"></i>
            </span>
        </a>
    </div>




    @include('Web.footer-js')

</html>