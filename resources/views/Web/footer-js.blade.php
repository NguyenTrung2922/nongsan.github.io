<script>
    fbq('track', 'AddToCart', {
        value: 3.50,
        currency: 'USD'
    });
</script>

<script>
    $(window).resize(function() {
        $('li.dropdown li.active').parents('.dropdown').addClass('active');
        if ($('.right-menu').width() + $('#navbar').width() > $('.check_nav.nav-wrapper')
            .width() - 40) {
            $('.container-mp.nav-wrapper').addClass('responsive-menu');
        } else {
            $('.container-mp.nav-wrapper').removeClass('responsive-menu');
        }
    })

    $(document).on("click",
        "ul.mobile-menu-icon .dropdown-menu ,.drop-control .dropdown-menu, .drop-control .input-dropdown",
        function(e) {
            e.stopPropagation();
        });
</script>

<script>
    var p_select_data = $('.p-option-wrapper').html();
    var p_zoom = $('.image-zoom').html();
    var quickViewProduct = function(purl) {

        if ($(window).width() < 680) {
            window.location = purl;
            return false;
        }
        modal = $('#quick-view-modal');
        modal.modal('show');
        $.ajax({
            url: purl + '.js',
            success: function(product) {
                $.each(product.options, function(i, v) {
                    product.options[i] = v.name;
                })
                modal.find('.p-title').html(product.title);
                modal.find('.p-option-wrapper').html(p_select_data);
                $('.image-zoom').html(p_zoom);
                modal.find('.p-url').attr('href', product.url);

                $.each(product.variants, function(i, v) {
                    modal.find('select#p-select').append("<option value='" + v.id + "'>" + v
                        .title + ' - ' + v.price + "</option>");
                })
                if (product.variants.length == 1 && product.variants[0].title.indexOf('Default') != -1)
                    $('.p-option-wrapper').hide();
                else
                    $('.p-option-wrapper').show();
                if (product.variants.length == 1 && product.variants[0].title.indexOf('Default') != -
                    1) {
                    callBack(product.variants[0], null);
                } else {
                    new Haravan.OptionSelectors("p-select", {
                        product: product,
                        onVariantSelected: callBack
                    });
                    if (product.options.length == 1 && product.options[0].indexOf('Tiêu đề') == -1)
                        modal.find('.selector-wrapper:eq(0)').prepend('<label>' + product.options[0] +
                            '</label>');
                    $('.p-option-wrapper select:not(#p-select)').each(function() {
                        $(this).wrap(
                            '<span class="custom-dropdown custom-dropdown--white"></span>');
                        $(this).addClass(
                            "custom-dropdown__select custom-dropdown__select--white");
                    });
                    callBack(product.variants[0], null);
                }
                if (product.images.length == 0) {
                    modal.find('.p-product-image-feature').attr('src',
                        '//hstatic.net/0/0/global/noDefaultImage6_large.gif');
                } else {
                    /*
                    $('#p-sliderproduct').remove();
                     $('.image-zoom').append("<div id='p-sliderproduct' class='flexslider'>");
                     $('#p-sliderproduct').append("<ul class='slides'>");

                     $.each(product.images, function (i, v) {
                    	 elem = $('<li class="product-thumb">').append('<a href="#" data-image="" data-zoom-image=""><img /></a>');
                    	 elem.find('a').attr('data-image', Haravan.resizeImage(v, 'medium'));
                    	 elem.find('a').attr('data-zoom-image', v);
                    	 elem.find('img').attr('data-image', Haravan.resizeImage(v, 'medium'));
                    	 elem.find('img').attr('data-zoom-image',v);
                    	 elem.find('img').attr('src', Haravan.resizeImage(v, 'small'));
                    	 modal.find('.slides').append(elem);
                     });

                     modal.find('.p-product-image-feature').attr('src', product.featured_image);
                     $(".modal-footer .btn-readmore").attr('href', purl);
                     var iflag = 0;
                     $('#p-sliderproduct img').load(function () {
                    	 iflag++;
                    	 if (iflag == $('#p-sliderproduct img').length) {
                    		 $('#p-sliderproduct img').imagesLoaded( function() {
                    			 $('#p-sliderproduct').flexslider({
                    				 animation: "slide",
                    				 controlNav: false,
                    				 animationLoop: false,
                    				 slideshow: false,
                    				 itemWidth: 90
                    			 });
                    		 });
                    	 }
                     });
                     */
                    $('#p-sliderproduct').remove();
                    $('.image-zoom').append("<div id='p-sliderproduct'>");
                    $('#p-sliderproduct').append("<ul class='owl-carousel'>");
                    $.each(product.images, function(i, v) {
                        elem = $('<li class="item">').append(
                            '<a href="#" data-image="" data-zoom-image=""><img /></a>');
                        elem.find('a').attr('data-image', Haravan.resizeImage(v, 'medium'));
                        elem.find('a').attr('data-zoom-image', v);
                        elem.find('img').attr('data-image', Haravan.resizeImage(v, 'medium'));
                        elem.find('img').attr('data-zoom-image', v);
                        elem.find('img').attr('src', Haravan.resizeImage(v, 'small'));
                        modal.find('.owl-carousel').append(elem);
                    });
                    var owl = $('.owl-carousel');
                    owl.owlCarousel({
                        items: 3,
                        navigation: true,
                        navigationText: ['owl-prev', 'owl-next']
                    });
                    $('#p-sliderproduct .owl-carousel .owl-item').first().children('.item').addClass(
                        'active');
                    modal.find('.p-product-image-feature').attr('src', product.featured_image);
                    $(".modal-footer .btn-readmore").attr('href', purl);
                }
            }
        });
        //$('.modal-backdrop').css('opacity', '0');
        return false;
    }
    $('#quick-view-modal').on('click', '.item img', function(event) {
        event.preventDefault();
        modal = $('#quick-view-modal');
        modal.find('.p-product-image-feature').attr('src', $(this).attr('data-zoom-image'));
        modal.find('.item').removeClass('active');
        $(this).parents('li').addClass('active');
        return false;
    });

    $(document).on("click", ".mask img", function(event) {
        //event.preventDefault();
        //quickViewProduct($(this).attr('data-handle'));
    });
</script>


<script>
    $(document).ready(function() {

        var myMenu = document.getElementById("myMenu");
        var sticky = myMenu.offsetTop;

        function scroll() {
            if ($(window).scrollTop() >= sticky) {
                myMenu.classList.add("sticky");
            } else {
                myMenu.classList.remove("sticky");
            }
        }
        document.onscroll = scroll;
    });
</script>


<script>
    jQuery(document).ready(function() {
        //Check to see if the window is top if not then display button
        jQuery(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.scrollToTop').fadeIn();
            } else {
                $('.scrollToTop').fadeOut();
            }
        });

        //Click event to scroll to top
        jQuery('.scrollToTop').click(function() {
            $('html, body').animate({
                scrollTop: 0
            }, 600);
            return false;
        });

    });
</script>



<!-- Google Code dành cho Thẻ tiếp thị lại -->
<!--------------------------------------------------
Không thể liên kết thẻ tiếp thị lại với thông tin nhận dạng cá nhân hay đặt thẻ tiếp thị lại trên các trang có liên quan đến danh mục nhạy cảm. Xem thêm thông tin và hướng dẫn về cách thiết lập thẻ trên: http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script>
    var google_tag_params = {
        ecomm_pagetype: 'home',
        dynx_pagetype: 'home'
    };
</script>
<script>
    /* <![CDATA[ */
    var google_conversion_id = 845015140;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
</script>
<script type="text/javascript" src="https://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="https://googleads.g.doubleclick.net/pagead/viewthroughconversion/845015140/?value=0&amp;guid=ON&amp;script=0" />
    </div>
</noscript>

<!--begin smart-search-->
<script src='https://theme.hstatic.net/1000162838/1000469515/14/ega.smartsearch.configs.js?v=657' type='text/javascript'></script>

<script src="/helper/helper.js"></script>

<script src="/thongbao/jquery-1.11.2.min.js" type="text/javascript"></script>
<script src="/thongbao/bootstrap.min.js" type="text/javascript"></script>
<script src="/thongbao/jquery.metisMenu.js" type="text/javascript"></script>
<script src="/thongbao/slick.min.js" type="text/javascript"></script>
<script src="/thongbao/jquery.imageScroller.js" type="text/javascript"></script>
<script src="/thongbao/jquery.wmuSlider.min.js" type="text/javascript"></script>
<script src="/thongbao/jquery.wmuGallery.min.js" type="text/javascript"></script>
<script src="/thongbao/jquery.mmenu.min.all.js" type="text/javascript"></script>
<script src="/thongbao/jquery.nicescroll.min.js" type="text/javascript"></script>
<script src="/thongbao/modernizr.custom.js" type="text/javascript"></script>
<script src="/thongbao/jquery.imagesloaded.min.js" type="text/javascript"></script>
<script src="/thongbao/cbpBGSlideshow.min.js" type="text/javascript"></script>
<script src="/thongbao/jquery.easing.js" type="text/javascript"></script>
<script src="/thongbao/script.js" type="text/javascript"></script>

<script src="/thongbao/cf.js" type="text/javascript"></script>
<script src="/thongbao/cf_style.js" type="text/javascript"></script>
<!--end smart-search-->

@yield('Web.footer-js')