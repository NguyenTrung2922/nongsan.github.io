<header class="container clearfix" style="padding: 0px">
    <div class="logo col-md-3 col-xs-12">
        <!-- LOGO -->
        <a href="/">
            <img src="{{ asset('logo-nong-san.png') }}" alt="Nông sản DakLak" class="img-responsive" style="width:100px"/>
        </a>

        <h1 style="display:none">
            <a href="/">Tấn Phong - Thiết bị điện thông minh</a>
        </h1>


    </div>
    <div class="seach-header col-md-6 col-sm-6 col-xs-12">
        <div id="SearchForm">
            <div id="SearchFormContainer">
                <form id="search-form" action="/search" method="GET">
                    <input type="hidden" name="type" value="product" class="search-input"
                        placeholder="Tìm kiếm ..." />
                    <input type="text" name="q" class="search-input" placeholder="Tìm kiếm ..."
                        value="{{ app('request')->input('q') }}" />
                    <button id="ctlSearch_ctl00_btnSearch">
                        <img src="https://sw001.hstatic.net/6/014cbf7c2aac46/icon-search1.png">
                    </button>
                </form>

            </div>
        </div>
    </div>


    <div class="phone-header col-md-3 col-sm-12 col-xs-12 pull-right" id="phoneHeader" style="display: none;">
        <span>Tư vấn</span><br />
        <a href="tel:0989 168 262">
            <i class="fa fa-mobile" aria-hidden="true" style="font-size: 25px;"></i> 0989 168 262
        </a>
    </div>



</header>


<script>
    document.getElementById('search-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định của form

        // Lấy giá trị từ ô input
        var searchQuery = document.getElementById('search-form').elements['q'].value;

        // Kiểm tra xem ô input có giá trị không
        if (searchQuery.trim() !== '') {
            // Tạo đường dẫn tới trang tìm kiếm với tham số q
            var searchUrl = '/search/' + encodeURIComponent(searchQuery);

            // Chuyển hướng tới trang tìm kiếm
            window.open(searchUrl, '_blank');
        }
    });
</script>

<script>
    // Chờ cho tất cả nội dung được load xong trước khi kiểm tra kích thước màn hình
    window.onload = function() {
        checkScreenSize();

        // Kích thước màn hình thay đổi
        window.onresize = checkScreenSize;
    };

    function checkScreenSize() {
        var phoneHeader = document.getElementById('phoneHeader');

        // Kiểm tra nếu kích thước màn hình nhỏ hơn một ngưỡng nào đó (ví dụ: 768px)
        if (window.innerWidth < 768) {
            phoneHeader.style.display = 'block'; // Hiển thị phần tử
        } else {
            phoneHeader.style.display = 'none'; // Ẩn phần tử
        }
    }
</script>
