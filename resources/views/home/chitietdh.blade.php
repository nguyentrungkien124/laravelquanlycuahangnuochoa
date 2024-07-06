@extends('master.main')
@section('title', 'Chi tiết đơn hàng')
@section('main')

<div class="site-content">
    <main class="site-main main-container no-sidebar">
        <div class="container">
            <div class="breadcrumb-trail breadcrumbs">
                <ul class="trail-items breadcrumb">
                    <li class="trail-item trail-begin">
                        <a href="{{ route('home.index') }}">
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="trail-item trail-end">
                        <a href="{{ route('dathang.lichsudh') }}">
                            <span>Lịch sử đơn hàng</span>
                        </a>
                    </li>
                    <li class="trail-item trail-end active">
                        <span>Chi tiết đơn hàng</span>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="main-content-order-detail main-content col-sm-12">
                    <h3 class="custom_blog_title">Chi tiết đơn hàng</h3>
                    <div class="page-main-content">
                        <div class="order-detail-content">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Thông tin khách hàng</h4>
                                    <ul class="list-unstyled">
                                        <li><strong>Họ và tên: </strong>{{ $auth->tenkh }}</li>
                                        <li><strong>Số điện thoại: </strong>{{ $auth->sodt }}</li>
                                        <li><strong>Địa chỉ: </strong>{{ $auth->diachi }}</li>
                                        <li><strong>Email: </strong>{{ $auth->email }}</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h4>Thông tin giao hàng</h4>
                                    <ul class="list-unstyled">
                                        <li><strong>Họ và tên nhận hàng:{{ $dathang->tenkh }} </strong></li>
                                        <li><strong>Số điện thoại nhận hàng: {{ $dathang->sodt }}</strong></li>
                                        <li><strong>Địa chỉ nhận hàng:{{ $dathang->diachi }} </strong></li>
                                        <li><strong>Email nhận hàng: {{ $dathang->email }}</strong></li>
                                    </ul>
                                </div>
                            </div>
                            <h4>Sản phẩm trong đơn hàng:</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th class="product-name">Sản phẩm</th>
                                        <th class="product-name">Tên Sản phẩm</th>
                                        <th class="product-price">Giá</th>
                                        <th class="product-quantity">Số lượng</th>
                                        <th class="product-subtotal">Tổng cộng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dathang->details as $item)
                                        <tr class="order_item">
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td class="product-thumbnail">
                                                <img src="{{ asset('uploads/images/' . $item->sanpham->hinhanh) }}" alt="{{ $item->sanpham->tensp }}" style="width: 50px; height: 50px;">
                                            </td>
                                            <td class="product-name">{{ $item->sanpham->tensp }}</td>
                                            <td class="product-price">₫{{ number_format($item->gia, 0, ',', '.') }}</td>
                                            <td class="product-quantity">{{ $item->soluong }}</td>
                                            <td class="product-subtotal">₫{{ number_format($item->gia * $item->soluong, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="control-order">
                                <a class="btn btn-primary" href="{{ route('dathang.lichsudh') }}">Quay lại lịch sử đơn hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@stop
