@extends('master.ad')
@section('title', 'Chi tiết đơn hàng')
@section('main')
    @if($dathang->status != 2)
        @if($dathang->status != 3)
        <a href="{{route('dathang.update',$dathang->id)}}?status=2" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn chọn')">Đã giao hàng</a>
        <a href="{{route('dathang.update',$dathang->id)}}?status=3" class="btn btn-danger" style="background-color: rgb(78, 78, 38)" onclick="return confirm('Bạn có chắc chắn muốn chọn')">Đã hủy</a>
        @else
        <a href="{{route('dathang.update',$dathang->id)}}?status=1" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn chọn')">Khôi phục</a>
        @endif
    @endif
    <h3 class="custom_blog_title">Chi tiết đơn hàng</h3>
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
            @foreach ($dathang->details as $item)
                <tr class="order_item">
                    <td>{{ $loop->index + 1 }}</td>
                    <td class="product-thumbnail">
                        <img src="{{ asset('uploads/images/' . $item->sanpham->hinhanh) }}"
                            alt="{{ $item->sanpham->tensp }}" style="width: 50px; height: 50px;">
                    </td>
                    <td class="product-name">{{ $item->sanpham->tensp }}</td>
                    <td class="product-price">₫{{ number_format($item->gia, 0, ',', '.') }}</td>
                    <td class="product-quantity">{{ $item->soluong }}</td>
                    <td class="product-subtotal">₫{{ number_format($item->gia * $item->soluong, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
