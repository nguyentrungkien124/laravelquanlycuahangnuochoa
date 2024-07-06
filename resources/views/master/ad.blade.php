<!DOCTYPE html>
<html>

<head>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="ad_assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="ad_assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="ad_assets/dist/css/skins/_all-skins.min.css">
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <style>
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 85%;
            z-index: 1030;
        }

        .content-wrapper {
            padding-top: 50px;
        }

        .logo {
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1030;
            background-color: #3c8dbc;
            padding: 10px;
            color: #fff;
            text-decoration: none;
        }
    </style>

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper"style="background-color: #306e8b">

        <header class="main-header">
            <!-- Logo -->
            <a href="ad_assets/index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>T</b>K</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Kiên</b>ADMIN</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="uploads/images/ad.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{ auth()->user()->name }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="navbar-text custom-text">
                    <span style="color: #fff;font-size:15px">Trang quản trị cửa hàng bán nước hoa</span>
                </div>
            </nav>
        </header>


        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar" style="background-color: #306e8b">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="uploads/images/ad.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{ auth()->user()->name }}</p>
                        <a href="{{ route('admin.logout') }}"><i class="fa fa-circle text-success"></i> Log out</a>
                    </div>
                </div>
                <ul class="sidebar-menu">
                    <li class="header" style="background: #fff">MAIN NAVIGATION</li>
                    <li class="treeview">
                        <a href="{{ route('admin.index') }}">
                            <i class="fa fa-home"></i> <span>Thống kê</span> <i></i>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fas fa-box-open"></i> <span>Sản phẩm</span> <i
                                class="fas fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('sanpham.index') }}"><i class="fas fa-list"></i>Danh sách sản phẩm</a>
                            </li>
                            <li><a href="{{ route('sanpham.create') }}"><i class="fas fa-plus-circle"></i>Thêm sản
                                    phẩm</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fas fa-tags"></i> <span>Loại sản phẩm</span> <i
                                class="fas fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('loaisp.index') }}"><i class="fas fa-list"></i>Danh sách loại sản
                                    phẩm</a></li>
                            <li><a href="{{ route('loaisp.create') }}"><i class="fas fa-plus-circle"></i>Thêm loại sản
                                    phẩm</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fas fa-image"></i> <span>Slide</span> <i class="fas fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('slide.index') }}"><i class="fas fa-list"></i>Danh sách slide</a></li>
                            <li><a href="{{ route('slide.create') }}"><i class="fas fa-plus-circle"></i>Thêm slide</a>
                            </li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fas fa-file-invoice-dollar"></i> <span>Hóa đơn bán</span> <i
                                class="fas fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('dathang.index') }}"><i class="fas fa-list"></i>Danh sách hóa đơn</a>
                            </li>
                            <li><a href="{{ route('dathang.index') }}?status=0"><i class="fas fa-circle-notch"></i>Hóa
                                    đơn chưa xác nhận</a></li>
                            <li><a href="{{ route('dathang.index') }}?status=2"><i class="fas fa-truck"></i>Đơn đã
                                    giao</a></li>
                            <li><a href="{{ route('dathang.index') }}?status=3"><i class="fas fa-ban"></i>Đơn hủy</a>
                            </li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fas fa-file-invoice"></i> <span>Hóa đơn nhập</span> <i
                                class="fas fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('hoadonnhap.index') }}"><i class="fas fa-list"></i>Danh sách hóa
                                    đơn nhập</a></li>
                            <li><a href="{{ route('hoadonnhap.create') }}"><i class="fas fa-plus-circle"></i>Thêm hóa
                                    đơn nhập</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fas fa-industry"></i> <span>Nhà phân phối </span> <i
                                class="fas fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('nhaphanphoi.index') }}"><i class="fas fa-list"></i>Danh sách hóa
                                    đơn nhập</a></li>
                            <li><a href="{{ route('nhaphanphoi.create') }}"><i class="fas fa-plus-circle"></i>Thêm
                                    hóa đơn nhập</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                      <a href="#">
                          <i class="fas fa-user"></i> <span>Khách hàng</span> <i
                              class="fas fa-angle-left pull-right">
                            </i>
                      </a>
                      <ul class="treeview-menu">
                          <li><a href="{{ route('nguoidung.index') }}"><i class="fas fa-list"></i>Danh sách khách hàng</a></li>
                          <li><a href="{{ route('nguoidung.create') }}"><i class="fas fa-plus-circle"></i>Thêm
                                 khách hàng
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="treeview">
                    <a href="#">
                        <i class="fas fa-blog"></i> <span>Blogs</span> <i
                            class="fas fa-angle-left pull-right">
                          </i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('blogs.index') }}"><i class="fas fa-list"></i>Danh sách blogs</a></li>
                        <li><a href="{{ route('blogs.create') }}"><i class="fas fa-plus-circle"></i>Thêm
                                blogs
                            </a>
                        </li>
                    </ul>
                </li>

                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    @yield('title')
                    <script>
                        CKEDITOR.replace('ghichu');
                    </script>
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="box">
                    <div class="box-body">
                        @if (Session::has('yes'))
                            <div class="alert alert-succes">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                {{ Session::get('ok') }}
                            </div>
                        @endif

                        @if (Session::has('no'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                {{ Session::get('no') }}
                            </div>
                        @endif
                        @yield('main')
                    </div><!-- /.box-body -->
                </div><!-- /.box-footer-->
        </div><!-- /.box -->

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->


    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <!-- jQuery 2.1.4 -->
    <script src="ad_assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="ad_assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="ad_assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="ad_assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="ad_assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="ad_assets/dist/js/demo.js"></script>
</body>

</html>
