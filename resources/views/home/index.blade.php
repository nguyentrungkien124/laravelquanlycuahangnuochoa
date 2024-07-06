@extends('master.main')
@section('title', 'trang chủ ')
@section('main')

    <div style="margin-top: 10px;font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif" >
        <div class="fullwidth-template">
            <div class="home-slider-banner">
                <div class="container">
                    <div class="row10">
                        <div class="col-lg-8 silider-wrapp">
                            <div class="home-slider">
                                <div class="slider-owl owl-slick equal-container nav-center"
                                    data-slick='{"autoplay":true, "autoplaySpeed":9000, "arrows":false, "dots":true, "infinite":true, "speed":1000, "rows":1}'
                                    data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":1}}]'>
                                    @foreach ($slide as $slide)
                                        <div class="slider-item style7">
                                            <div class="slider-inner equal-element">
                                                <div class="slider-infor">
                                                    <img src="uploads/images/{{ $slide->image }}" alt="">
                                                    <h5 class="title-small">
                                                        Giảm giá kịch sàn 40%!
                                                    </h5>
                                                    <h3 class="title-big">
                                                        {{ $slide->tenslide }}<br />Duy nhất 1 hôm
                                                    </h3>
                                                    <div class="price">
                                                        Giá chỉ còn :
                                                        <span class="number-price">
                                                            {{ number_format($slide->gia) }}VNĐ
                                                        </span>
                                                    </div>
                                                    @foreach ($cats_home as $cath)
                                                        @if ($cath->tenlsp == 'Nước hoa nam')
                                                            <!-- Kiểm tra nếu đây là danh mục "Nước hoa nam" -->
                                                            <li>
                                                                <a href="{{ route('home.loaisp', ['cat' => $cath->id]) }}"
                                                                    class="button btn-shop-the-look bgroud-style">Mua
                                                                    ngay</a>
                                                            </li>
                                                        @endif
                                                    @endforeach


                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 banner-wrapp"
                            style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
                            <div class="banner">
                                <div class="item-banner style7">
                                    <div class="inner">
                                        <div class="banner-content">
                                            <h3 class="title">Có lẽ phù hợp <br />Với Bạn</h3>
                                            <div class="description">
                                                Những sản phẩm độc đáo
                                            </div>
                                            @foreach ($cats_home as $cath)
                                                @if ($cath->tenlsp == 'Nước hoa nữ')
                                                    <!-- Kiểm tra nếu đây là danh mục "Nước hoa nam" -->

                                                    <a href="{{ route('home.loaisp', ['cat' => $cath->id]) }}"
                                                        class="button btn-shop-the-look bgroud-style">Mua
                                                        ngay</a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="banner">
                                <div class="item-banner style8">
                                    <div class="inner">
                                        <div class="banner-content">
                                            <h3 class="title">Những Sản Phẩm
                                                <div class="description">
                                                    Mà có cửa hàng chúng tôi
                                                </div>
                                                @foreach ($cats_home as $cath)
                                                @if ($cath->tenlsp == 'Combo')
                                                    <!-- Kiểm tra nếu đây là danh mục "Nước hoa nam" -->

                                                    <a href="{{ route('home.loaisp', ['cat' => $cath->id]) }}"
                                                        class="button btn-shop-the-look bgroud-style">Mua
                                                        ngay</a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="stelina-product produc-featured rows-space-65">
                <div class="container">
                    <h3 class="custommenu-title-blog">
                        FLASH SALE
                    </h3>
                    <div class="owl-products owl-slick equal-container nav-center"
                        data-slick='{"autoplay":false, "autoplaySpeed":1000, "arrows":false, "dots":true, "infinite":false, "speed":800, "rows":1}'
                        data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":4}},{"breakpoint":"1200","settings":{"slidesToShow":3}},{"breakpoint":"992","settings":{"slidesToShow":2}},{"breakpoint":"480","settings":{"slidesToShow":1}}]'>
                        @foreach ($deal_sanpham as $dsp)
                            <div class="product-item style-5">
                                <div class="product-inner equal-element">
                                    <div class="product-top">
                                        <div class="flash">
                                            <span class="onnew">
                                                <span class="text">
                                                    sale
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product-thumb">
                                        <div class="thumb-inner">
                                            <a href="#">
                                                <img src="uploads/images/{{ $dsp->hinhanh }}" alt="img">
                                            </a>
                                            <div class="thumb-group">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <div class="yith-wcwl-add-button">
                                                        @if (auth('cus')->check())
                                                            @if ($dsp->favorited)
                                                                <a title="Bỏ thích"
                                                                    onclick="return confirm('Bạn muốn bỏ thích không')"
                                                                    href="{{ route('home.favorite', $dsp->id) }}"
                                                                    class="heart-icon" style="color:red;">
                                                                    <i class="fa-regular fa-heart"></i>
                                                                    <span>Bỏ thích</span>
                                                                </a>
                                                            @else
                                                                <a title="Yêu thích"
                                                                    href="{{ route('home.favorite', $dsp->id) }}"
                                                                    class="heart-icon" style="color:black;">
                                                                    <i class="fa-solid fa-heart"></i>
                                                                    <span>Yêu thích</span>
                                                                </a>
                                                            @endif
                                                            @if ($dsp->soluong > 0)
                                                                <a title="Thêm giỏ hàng"
                                                                    href="{{ route('giohang.add', $dsp->id) }}"
                                                                    class="cart-icon" style="color:black;">
                                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                                    <span>Thêm giỏ hàng</span>
                                                                </a>
                                                            @else
                                                                <span class="cart-icon"
                                                                    style="color:gray; cursor:not-allowed;">
                                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                                    <span>Hết hàng</span>
                                                                </span>
                                                            @endif
                                                        @else
                                                            <a title="Thêm giỏ hàng" href="{{ route('account.login') }}"
                                                                onclick="alert('Vui lòng đăng nhập để thêm giỏ hàng')"
                                                                class="cart-icon" style="color:black;">
                                                                <i class="fa-solid fa-cart-shopping"></i>
                                                                <span>Thêm giỏ hàng</span>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-name product_title">
                                            <a href="{{ route('home.sanpham', $dsp->id) }}">{{ $dsp->tensp }}</a>
                                        </h5>
                                        <div class="group-info">
                                            <div class="price">
                                                <del>
                                                    {{ number_format($dsp->gia) }}đ
                                                </del>
                                                <ins>
                                                    {{ number_format($dsp->giakm) }}đ
                                                </ins>
                                            </div>
                                        </div>
                                        <div class="count-product">
                                            @if ($dsp->soluong > 0)
                                                Số lượng: <span>{{ $dsp->soluong }}
                                                @else
                                                    <span>Số lượng:hết hàng</span>
                                            @endif
                                            </span>
                                            Đã bán: <span>{{ $dsp->total_sold }}</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="banner-wrapp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="banner">
                                <div class="item-banner style4">
                                    <div class="inner">
                                        <div class="banner-content">
                                            <h4 class="stelina-subtitle">Lựa Chọn Hàng Đầu</h4>
                                            <h3 class="title">Bộ Sưu Tập Tốt Nhất</h3>
                                            <div class="description">
                                                Proin interdum magna primis id consequat
                                            </div>
                                            @foreach ($cats_home as $cath)
                                            @if ($cath->tenlsp == 'Nước hoa nam')
                                                <!-- Kiểm tra nếu đây là danh mục "Nước hoa nam" -->

                                                <a href="{{ route('home.loaisp', ['cat' => $cath->id]) }}"
                                                    class="button btn-shop-the-look bgroud-style">Mua
                                                    ngay</a>
                                            @endif
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="banner">
                                <div class="item-banner style5">
                                    <div class="inner">
                                        <div class="banner-content">
                                            <h3 class="title">Có Lẽ Bạn Đã <br />Xứng Đáng</h3>
                                            <span class="code">
                                                Sử dụng mã:
                                                <span>
                                                    STELINA
                                                </span>
                                                Giảm 25% cho tất cả các sản phẩm!
                                            </span>
                                            @foreach ($cats_home as $cath)
                                            @if ($cath->tenlsp == 'Combo')
                                                <!-- Kiểm tra nếu đây là danh mục "Nước hoa nam" -->

                                                <a href="{{ route('home.loaisp', ['cat' => $cath->id]) }}"
                                                    class="button btn-shop-the-look bgroud-style">Mua
                                                    ngay</a>
                                            @endif
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-wrapp rows-space-65">
                <div class="container">
                    <div class="banner">
                        <div class="item-banner style17">
                            <div class="inner">
                                <div class="banner-content">
                                    <h3 class="title">Bộ Sưu Tập Đã Đến</h3>
                                    <div class="description">
                                        Bạn không có món hàng nào & Bạn có <br />sẵn sàng sử dụng không? Hãy đến & mua sắm cùng chúng tôi!
                                    </div>
                                    <div class="banner-price">
                                        Giá từ:
                                        <span class="number-price">900.000₫</span>
                                    </div>
                                    @foreach ($cats_home as $cath)
                                                @if ($cath->tenlsp == 'Nước hoa nữ')
                                                    <!-- Kiểm tra nếu đây là danh mục "Nước hoa nam" -->

                                                    <a href="{{ route('home.loaisp', ['cat' => $cath->id]) }}"
                                                        class="button btn-shop-the-look bgroud-style">Mua
                                                        ngay</a>
                                                @endif
                                            @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="stelina-tabs  default rows-space-40">
                <div class="container">
                    <div class="tab-head">
                        <ul class="tab-link">
                            <li class="active">
                                <a data-toggle="tab" aria-expanded="true" href="#new_arrivals">Sản phẩm mới </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-container">
                        <div id="new_arrivals" class="tab-panel active">
                            <div class="stelina-product">
                                <ul class="row list-products auto-clear equal-container product-grid">
                                    @foreach ($new_sanpham as $nsp)
                                        <li class="product-item col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                            <div class="product-inner equal-element">
                                                <div class="product-top">
                                                    <div class="flash">
                                                        <span class="onnew">
                                                            <span class="text">new</span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="product-thumb">
                                                    <div class="thumb-inner">
                                                        <a href="#">
                                                            <img src="uploads/images/{{ $nsp->hinhanh }}" alt="img">
                                                        </a>

                                                        <div class="thumb-group">
                                                            <div class="yith-wcwl-add-to-wishlist">
                                                                <div class="yith-wcwl-add-button">
                                                                    @if (auth('cus')->check())
                                                                        @if ($nsp->favorited)
                                                                            <a title="Bỏ thích"
                                                                                onclick="return confirm('Bạn muốn bỏ thích không')"
                                                                                href="{{ route('home.favorite', $nsp->id) }}"
                                                                                class="heart-icon" style="color:red;">
                                                                                <i class="fa-regular fa-heart"></i>
                                                                                <span>Bỏ thích</span>
                                                                            </a>
                                                                        @else
                                                                            <a title="Yêu thích"
                                                                                href="{{ route('home.favorite', $nsp->id) }}"
                                                                                class="heart-icon" style="color:black;">
                                                                                <i class="fa-solid fa-heart"></i>
                                                                                <span>Yêu thích</span>
                                                                            </a>
                                                                        @endif
                                                                        @if ($nsp->soluong > 0)
                                                                            <a title="Thêm giỏ hàng"
                                                                                href="{{ route('giohang.add', $nsp->id) }}"
                                                                                class="cart-icon" style="color:black;">
                                                                                <i class="fa-solid fa-cart-shopping"></i>
                                                                                <span>Thêm giỏ hàng</span>
                                                                            </a>
                                                                        @else
                                                                            <span class="cart-icon"
                                                                                style="color:gray; cursor:not-allowed;">
                                                                                <i class="fa-solid fa-cart-shopping"></i>
                                                                                <span>Hết hàng</span>
                                                                            </span>
                                                                        @endif
                                                                    @else
                                                                        <a title="Thêm giỏ hàng"
                                                                            href="{{ route('account.login') }}"
                                                                            onclick="alert('Vui lòng đăng nhập để thêm giỏ hàng')"
                                                                            class="cart-icon" style="color:black;">
                                                                            <i class="fa-solid fa-cart-shopping"></i>
                                                                            <span>Thêm giỏ hàng</span>
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="product-info">
                                                            <h5 class="product-name product_title">
                                                                <a
                                                                    href="{{ route('home.sanpham', $nsp->id) }}">{{ $nsp->tensp }}</a>
                                                            </h5>
                                                            <div class="group-info">
                                                                <div class="stars-rating">
                                                                    <div class="star-rating">
                                                                        <span class="star-3"></span>
                                                                    </div>
                                                                    <div class="count-star">(3)</div>
                                                                </div>
                                                                <div class="price">
                                                                    <del>{{ number_format($nsp->gia) }}đ</del>
                                                                    <ins>{{ number_format($nsp->giakm) }}đ</ins>
                                                                </div>
                                                            </div>
                                                            <div class="count-product">
                                                                Số lượng: <span>
                                                                    @if ($nsp->soluong > 0)
                                                                        {{ $nsp->soluong }}
                                                                    @else
                                                                        hết hàng
                                                                    @endif
                                                                </span>
                                                                Đã bán: <span>{{ $nsp->total_sold }}</span>
                                                            </div>

                                                        </div>

                                                    </div>

                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="stelina-iconbox-wrapp default">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="stelina-iconbox default">
                                    <div class="iconbox-inner">
                                        <div class="icon-item">
                                            <span class="icon flaticon-rocket-ship"></span>
                                        </div>
                                        <div class="content">
                                            <h4 class="title">
                                                Giao Hàng Miễn Phí EU
                                            </h4>
                                            <div class="text">
                                                Giao hàng miễn phí cho tất cả đơn hàng từ EU <br />với giá trị trên 2.100.000₫
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="stelina-iconbox default">
                                    <div class="iconbox-inner">
                                        <div class="icon-item">
                                            <span class="icon flaticon-return"></span>
                                        </div>
                                        <div class="content">
                                            <h4 class="title">
                                                Đảm Bảo Hoàn Tiền
                                            </h4>
                                            <div class="text">
                                                Đảm bảo hoàn tiền trong 30 ngày <br />không cần lý do!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="stelina-iconbox default">
                                    <div class="iconbox-inner">
                                        <div class="icon-item">
                                            <span class="icon flaticon-padlock"></span>
                                        </div>
                                        <div class="content">
                                            <h4 class="title">
                                                Hỗ Trợ Trực Tuyến 24/7
                                            </h4>
                                            <div class="text">
                                                Chúng tôi luôn sẵn sàng hỗ trợ bạn. <br />Hãy mua sắm ngay!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="instagram-wrapp">
            <div>
                <h3 class="custommenu-title-blog">
                    <i class="flaticon-instagram" aria-hidden="true"></i>
                    Instagram Feed
                </h3>
                <div class="stelina-instagram">
                    <div class="instagram owl-slick equal-container"
                        data-slick='{"autoplay":false, "autoplaySpeed":1000, "arrows":false, "dots":false, "infinite":true, "speed":800, "rows":1}'
                        data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":5}},{"breakpoint":"1200","settings":{"slidesToShow":4}},{"breakpoint":"992","settings":{"slidesToShow":3}},{"breakpoint":"768","settings":{"slidesToShow":2}},{"breakpoint":"481","settings":{"slidesToShow":2}}]'>
                        <div class="item-instagram">
                            <a href="#">
                                <img src="uploads/images/item-instagram-1.jpg" alt="img">
                            </a>
                            <span class="text">
                                <i class="icon flaticon-instagram" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="item-instagram">
                            <a href="#">
                                <img src="uploads/images/item-instagram-2.jpg" alt="img">
                            </a>
                            <span class="text">
                                <i class="icon flaticon-instagram" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="item-instagram">
                            <a href="#">
                                <img src="uploads/images/item-instagram-3.jpg" alt="img">
                            </a>
                            <span class="text">
                                <i class="icon flaticon-instagram" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="item-instagram">
                            <a href="#">
                                <img src="uploads/images/item-instagram-4.jpg" alt="img">
                            </a>
                            <span class="text">
                                <i class="icon flaticon-instagram" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="item-instagram">
                            <a href="#">
                                <img src="uploads/images/item-instagram-5.jpg" alt="img">
                            </a>
                            <span class="text">
                                <i class="icon flaticon-instagram" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop()
