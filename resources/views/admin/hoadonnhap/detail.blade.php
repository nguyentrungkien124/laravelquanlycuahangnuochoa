@extends('master.ad')

@section('title', 'Chi tiết đơn hàng nhập')

@section('main')
    <h4>Sản phẩm trong đơn hàng:</h4>
    {{-- @dd($hoadonnhap); --}}

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th class="product-name">Sản phẩm</th>
                <th class="product-name">Tên Sản phẩm</th>
                <th class="product-name">Ảnh</th>
                <th class="product-price">Giá</th>
                <th class="product-quantity">Số lượng</th>
                <th class="product-subtotal">Tổng cộng</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($hoadonnhap->chitiets as $chitiet)
                <tr class="order_item">
                    <td>{{ $loop->index + 1 }}</td>
                    <td class="product-name">{{ $chitiet->sanpham->tensp }}</td>
                    <td class="product-name">{{ $chitiet->sanpham->tenhang }}</td>
                    <td class="product-thumbnail">
                        <img src="{{ asset('uploads/images/' . $chitiet->sanpham->hinhanh) }}" alt="{{ $chitiet->sanpham->tensp }}" style="width: 50px; height: 50px;">
                    </td>
                    <td class="product-price">{{number_format($chitiet->giaNhap) }}</td>
                    <td class="product-quantity">{{ $chitiet->soLuong }}</td>
                    <td class="product-subtotal">{{ number_format($chitiet->tongtien) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Không có sản phẩm nào trong hóa đơn này.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@stop
