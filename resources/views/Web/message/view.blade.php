@extends('Web.main')

@section('content')

<section id="content" class="clearfix container">



    @include('Web.sidebar')


    <div id="page">
        <div class="col-md-9 col-xs-12" id="layout-page">

            <span class="header-contact header-page clearfix">
                <h1>Liên hệ</h1>
            </span>

            <div class="content-contact content-page">

                <p class="text-center">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3892.172803828088!2d108.0547139!3d12.7021418!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3171f7e747e4626d%3A0xc5e47e34da8ba796!2zODAgWSBNb2FuIMOKbnXDtGwsIFTDom4gTOG7o2ksIFRow6BuaCBwaOG7kSBCdcO0biBNYSBUaHXhu5l0LCDEkOG6r2sgTOG6r2s!5e0!3m2!1svi!2s!4v1702182676625!5m2!1svi!2s"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </p>

                <div class="col-md-7" id="col-left contactFormWrapper">
                    <h3>Viết nhận xét</h3>
                    <hr class="line-left" />
                    <p>
                        Nếu bạn có thắc mắc gì, có thể gửi yêu cầu cho chúng tôi, và chúng tôi sẽ liên lạc lại với bạn
                        sớm nhất có thể .
                    </p>
                    <form accept-charset='UTF-8' action='' class='contact-form' method='post'>
                        <input name='form_type' type='hidden' value='contact'>
                        <input name='utf8' type='hidden' value='✓'>




                        <div class="form-group">
                            <label for="contactFormName" class="sr-only">Tên</label>
                            <input required type="text" class="form-control input-lg" name="name"
                                placeholder="Tên của bạn" autocapitalize="words" value="">
                        </div>
                        <div class="form-group">
                            <label for="contactFormEmail" class="sr-only">Email</label>
                            <input required type="email" name="email" placeholder="Email của bạn"
                                class="form-control input-lg" autocorrect="off" autocapitalize="off" value="">
                        </div>
                        <div class="form-group">
                            <label for="contactFormMessage" class="sr-only">Nội dung</label>
                            <textarea required rows="6" name="content" class="form-control"
                                placeholder="Viết bình luận"></textarea>
                        </div>

                        <input type="submit" class="btn btn-primary btn-lg" value="Gửi liên hệ" />



                        @csrf
                    </form>
                    <h1 style="color:red" id="message"></h1>

                </div>

                {{-- <div class="col-md-5" id="col-right">
                    <h3>Chúng tôi ở đây</h3>
                    <hr class="line-right" />
                    <h3 class="name-company">Công ty cổ phần kĩ thuật điện và viễn thông Trường Đức</h3>
                    <p> Trường Đức cung cấp thiết bị điện thông minh nhà thông minh tại Việt Nam </p>
                    <ul class="info-address">
                        <li>
                            <i class="glyphicon glyphicon-map-marker"></i>
                            <span>80 Y Moan Ênuôi,Tân Lợi,Thành phố Buôn Ma Thuật,Đăk
                                Lăk</span>
                        </li>
                        <li>
                            <i class="glyphicon glyphicon-envelope"></i>
                            <span>vienthongtruongduc@gmail.com</span>
                        </li>

                        <li>
                            <i class="glyphicon glyphicon-phone-alt"></i>
                            <span>0989 168 262</span>
                        </li>

                    </ul>

                </div> --}}
            </div>
        </div>


</section>




@endsection



@section('footer')
@include('Web.footer')
@endsection

@section('Web.footer-js')
@if (Session::has('error'))
<?php $message = Illuminate\Support\Facades\Session::get('error'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById("message").innerHTML = "Gửi liên hệ lỗi";
});
</script>
@endif

@if (Session::has('success'))
<?php $message = Illuminate\Support\Facades\Session::get('success'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById("message").innerHTML = "Liên hệ đã được gửi đi. Cảm ơn bạn đã liên hệ chúng tôi";
});
</script>
@endif
@endsection