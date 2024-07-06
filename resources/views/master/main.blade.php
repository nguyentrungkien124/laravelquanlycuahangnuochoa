<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <title>@yield('title')</title>
    <link rel="icon" href="uploads/images/logo.png" type="image/png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" huploads/favicon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/chosen.min.css">
    <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="assets/css/lightbox.min.css">
    <link rel="stylesheet" href="assets/js/fancybox/source/jquery.fancybox.css">
    <link rel="stylesheet" href="assets/css/jquery.scrollbar.min.css">
    <link rel="stylesheet" href="assets/css/mobile-menu.css">
    <link rel="stylesheet" href="assets/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<body class="about-page" style=" font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">
    <header class="header style7">
        <div class="top-bar">
            <div class="container">
                <div class="top-bar-left">
                    <div class="header-message">
                        Xin chào mừng bạn đến cửa hàng!
                    </div>
                </div>
                <div class="top-bar-right">
                    <div class="header-language">
                        <div class="stelina-language stelina-dropdown">
                            <a href="#" class="active language-toggle" data-stelina="stelina-dropdown">
                                <span>
                                   Tiếng Việt(Vietnamese)
                                </span>
                            </a>
                        </div>
                    </div>
                    @if(auth('cus')->check())
                    <ul class="header-user-links">
                        <li ><a href="{{route('account.profile')}}">Hi {{auth('cus')->user()->tenkh}}</a></li>
                    </ul>
                    <ul class="header-user-links">
                        <li ><a href="{{route('account.change_password')}}">Đặt lại mật khẩu</a></li>
                    </ul>
                    <ul class="header-user-links">
                        <li ><a href="{{route('account.logout')}}">Thoát</a></li>
                    </ul>
                    <ul class="header-user-links">
                        <li ><a href="{{route('account.favorite')}}">Yêu thích</a></li>
                    </ul>
                    <ul class="header-user-links">
                        <li ><a href="{{route('dathang.lichsudh')}}">Lịch sử đơn </a></li>
                    </ul>
                    @else
                    <ul class="header-user-links">
                        <li>
                            <a href="{{route('account.register')}}">Đăng kí</a>
                        </li>
                    </ul>
                    <ul class="header-user-links">
                        <li>
                            <a href="{{route('account.login')}}"> Đăng nhập </a>
                        </li>
                    </ul>
                    @endif
                  
                </div>
            </div>
        </div>
        <div class="container">
            <div class="main-header">
                <div class="row">
                    <div class="col-lg-3 col-sm-4 col-md-3 col-xs-7 col-ts-12 header-element">
                        <div class="logo">
                            <a href="{{route('home.index')}}">
                                <img src="uploads/images/logo.png" alt="img">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-sm-8 col-md-6 col-xs-5 col-ts-12">
                        <div class="block-search-block">
                            <form class="form-search form-search-width-category" action="{{ route('home.search') }}" method="GET">
                                <div class="form-content">
                                    {{-- <div class="category">
                                        <select title="cate" name="category" data-placeholder="All Categories" class="chosen-select" tabindex="1">
                                            <option value="Accessories">Accessories</option>
                                            <option value="Accents">Accents</option>
                                            <option value="Desks">Desks</option>
                                            <option value="Sofas">Sofas</option>
                                            <option value="New Arrivals">New Arrivals</option>
                                            <option value="Bedroom">Bedroom</option>
                                        </select>
                                    </div> --}}
                                    <div class="inner">
                                        <input type="text" class="input" name="keyword" value="" placeholder="Tìm kiếm sản phẩm">
                                    </div>
                                    <button class="btn-search" type="submit">
                                        <span class="icon-search"></span>
                                    </button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-12 col-md-3 col-xs-12 col-ts-12">
                        <div class="header-control">
                            <div class="block-minicart stelina-mini-cart block-header stelina-dropdown">
                                <a href="javascript:void(0);" onclick="window.location.href='{{ route('giohang.index') }}'" class="shopcart-icon" data-stelina="stelina-dropdown">
                                    Cart
                                    <span class="count">{{$giohangs->sum('soluong')}}</span>
                                </a>
                                
                                <div class="no-product stelina-submenu">
                                    <p class="text">
                                        You have
                                        <span>
                                            <span class="count">{{$giohangs->sum('soluong')}}</span>
                                        </span>
                                        in your bag
                                    </p>
                                </div>
                            </div>
                            <!-- <div class="block-account block-header stelina-dropdown">
                                <a href="{{route('account.login')}}">
                                    <span class="flaticon-user"></span>
                                </a>
                            </div> -->
                            <a class="menu-bar mobile-navigation menu-toggle" href="#">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-nav-container">
            <div class="container">
                <div class="header-nav-wapper main-menu-wapper">
                    <div class="vertical-wapper block-nav-categori">
                        <div class="block-title">
                            <span class="icon-bar">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                            <span class="text">Danh mục</span>
                        </div>
                        <div class="block-content verticalmenu-content">
                            <ul class="stelina-nav-vertical vertical-menu stelina-clone-mobile-menu">
                                <li class="menu-item">
                                    <a href="#" class="stelina-menu-item-title" title="New Arrivals">New Arrivals</a>
                                </li>
                                @foreach($cats_home as $cath)
                                <li class="menu-item">
                                    <a href="{{route('home.loaisp',$cath->id)}}">{{$cath->tenlsp}}</a>
                                </li>
                                @endforeach
                                <li class="menu-item">
                                    <a href="{{route('home.blogs')}}" class="stelina-menu-item-title" title="New Arrivals">Bài viết</a>
                                </li>
                                {{-- <li class="menu-item menu-item-has-children">
                                    <a title="Accessories" href="#" class="stelina-menu-item-title">Accessories</a>
                                    <span class="toggle-submenu"></span>
                                    <ul role="menu" class=" submenu">
                                        <li class="menu-item">
                                            <a title="Living" href="#" class="stelina-item-title">Living</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Accents" href="#" class="stelina-item-title">Accents</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="New Arrivals" href="#" class="stelina-item-title">New Arrivals</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Accessories" href="#" class="stelina-item-title">Accessories</a>
                                        </li>
                                        <li class="menu-item">
                                            <a title="Bedroom" href="#" class="stelina-item-title">Bedroom</a>
                                        </li>
                                    </ul>
                                </li> --}}
                                {{-- <li class="menu-item">
                                    <a title="Accents" href="#" class="stelina-menu-item-title">Accents</a>
                                </li>
                                <li class="menu-item">
                                    <a title="Tables" href="#" class="stelina-menu-item-title">Tables</a>
                                </li>
                                <li class="menu-item">
                                    <a title="Dining" href="#" class="stelina-menu-item-title">Dining</a>
                                </li>
                                <li class="menu-item">
                                    <a title="Lighting" href="#" class="stelina-menu-item-title">Lighting</a>
                                </li>
                                <li class="menu-item">
                                    <a title="Office" href="#" class="stelina-menu-item-title">Office</a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="container-wapper">
                        <ul class="stelina-clone-mobile-menu stelina-nav main-menu " id="menu-main-menu">
                            <li class="menu-item  menu-item-has-children">
                                <a href="{{route('home.index')}}" class="stelina-menu-item-title" title="Home" style="">Trang chủ </a>
                            </li>
                            <li class="menu-item menu-item-has-children">
                                <a href="gridproducts.html" class="stelina-menu-item-title" title="Shop">Shop</a>
                                <span class="toggle-submenu"></span>
                                <ul class="submenu">
                                    @foreach($cats_home as $cath)
                                    <li class="menu-item">
                                        <a href="{{route('home.loaisp',$cath->id)}}">{{$cath->tenlsp}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>

                            
                            <li class="menu-item  menu-item-has-children">
                                <a href="{{route('home.blogs')}}" class="stelina-menu-item-title" title="Blogs">Bài viết</a>
                                <span class="toggle-submenu"></span>
                                
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('home.about') }}" class="stelina-menu-item-title" title="About">About</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>
    <div class="header-device-mobile">
        <div class="wapper">
            <div class="item mobile-logo">
                <div class="logo">
                    <a href="#">
                        <img uploads/logo.png" alt="img">
                    </a>
                </div>
            </div>
            <div class="item item mobile-search-box has-sub">
                <a href="#">
                    <span class="icon">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </span>
                </a>
                <div class="block-sub">
                    <a href="#" class="close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                    <div class="header-searchform-box">
                        <form class="header-searchform">
                            <div class="searchform-wrap">
                                <input type="text" class="search-input" placeholder="Enter keywords to search...">
                                <input type="submit" class="submit button" value="Search">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="item mobile-settings-box has-sub">
                <a href="#">
                    <span class="icon">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                    </span>
                </a>
                <div class="block-sub">
                    <a href="#" class="close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                    <div class="block-sub-item">
                        <h5 class="block-item-title">Currency</h5>
                        <form class="currency-form stelina-language">
                            <ul class="stelina-language-wrap">
                                <li class="active">
                                    <a href="#">
                                        <span>
                                            English (USD)
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>
                                            French (EUR)
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>
                                            Japanese (JPY)
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
            <div class="item menu-bar">
                <a class=" mobile-navigation  menu-toggle" href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>
        </div>
    </div>
    @yield('main')
    <footer class="footer style7">
        <div class="container">
            <div class="container-wapper">
                <div class="row">
                    <div class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4 hidden-sm hidden-md hidden-lg">
                        <div class="stelina-newsletter style1">
                            <div class="newsletter-head">
                                <h3 class="title">Bản tin</h3>
                            </div>
                            <div class="newsletter-form-wrap">
                                <div class="list">
                                    Đăng ký khóa học video miễn phí và<br /> cảm hứng làm vườn đô thị
                                </div>
                                <input type="email" class="input-text email email-newsletter" placeholder="Nhập email của bạn">
                                <button class="button btn-submit submit-newsletter">ĐĂNG KÝ</button>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="stelina-custommenu default">
                            <h2 class="widgettitle">Menu Nhanh</h2>
                            <ul class="menu">
                                <li class="menu-item">
                                    <a href="#">Hàng mới về</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Phong cách sống</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Phụ kiện</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Bàn</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Phòng ăn</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4 hidden-xs">
                        <div class="stelina-newsletter style1">
                            <div class="newsletter-head">
                                <h3 class="title">Bản tin</h3>
                            </div>
                            <div class="newsletter-form-wrap">
                                <div class="list">
                                    Đăng ký khóa học video miễn phí và<br /> cảm hứng làm vườn đô thị
                                </div>
                                <input type="email" class="input-text email email-newsletter" placeholder="Nhập email của bạn">
                                <button class="button btn-submit submit-newsletter">ĐĂNG KÝ</button>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="stelina-custommenu default">
                            <h2 class="widgettitle">Thông Tin</h2>
                            <ul class="menu">
                                <li class="menu-item">
                                    <a href="#">Câu hỏi thường gặp</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Theo dõi đơn hàng</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Giao hàng</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Liên hệ</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#">Đổi trả</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-end">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <div class="stelina-socials">
                                <ul class="socials">
                                    <li>
                                        <a href="#" class="social-item" target="_blank">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-item" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-item" target="_blank">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="coppyright">
                                Bản quyền © 2024
                                <a href="#">Trung Kiên</a>
                                . Bảo lưu mọi quyền
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    

    <a href="#" class="backtotop">
        <i class="fa fa-angle-double-up"></i>
    </a>
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <script src="assets/js/jquery.plugin-countdown.min.js"></script>
    <script src="assets/js/jquery-countdown.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/magnific-popup.min.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/jquery.scrollbar.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/mobile-menu.js"></script>
    <script src="assets/js/chosen.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/jquery.elevateZoom.min.js"></script>
    <script src="assets/js/jquery.actual.min.js"></script>
    <script src="assets/js/fancybox/source/jquery.fancybox.js"></script>
    <script src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/owl.thumbs.min.js"></script>
    <script src="assets/js/jquery.scrollbar.min.js"></script>
    <script src="assets/js/frontend-plugin.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
    @if(Session::has('ok'))
    <script>
        $.toast({
            heading: 'Thông báo',
            text: "{{ Session::get('ok') }}",
            showHideTransition: 'slide',
            icon: 'success',
            position: 'top-center',
        });
    </script>
    @endif

    @if(Session::has('no'))
    <script>
        $.toast({
            heading: 'Thông báo',
            text: "{{ Session::get('no') }}",
            showHideTransition: 'slide',
            icon: 'error',
            position: 'top-center',
        });
    </script>
    @endif

</body>


</html>