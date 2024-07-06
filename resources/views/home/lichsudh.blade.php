@extends('master.main')
@section('title', 'Lịch sử đơn hàng')
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
                    <li class="trail-item trail-end active">
                        <span>Lịch sử đơn hàng</span>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="main-content-order-history main-content col-sm-12">
                    <h3 class="custom_blog_title">Lịch sử đơn hàng</h3>
                    <div class="page-main-content">
                        <div class="order-history-content">
                            <table class="shop_table">
                                <thead>
                                    <tr>
                                        <th class="order-id">Mã đơn hàng</th>
                                        <th class="order-date">Ngày đặt</th>
                                        <th class="order-status">Trạng thái</th>
                                        <th class="order-total">Tổng tiền</th>
                                        <th class="order-actions">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($auth->dathangs as $lichsudh)
                                        <tr class="order_item">
                                            <td class="order-id" >{{$loop->index+1}}</td>
                                            <td class="order-date" data-title="Ngày đặt">{{ $lichsudh->created_at->format('d/m/Y') }}</td>
                                            <td class="order-status" data-title="Trạng thái">
                                                @if($lichsudh->status == 0)
                                                <span>Chưa xác nhận đơn hàng</span>
                                                @elseif($lichsudh->status == 1)
                                                <span>Đã xác nhận</span>
                                                @elseif($lichsudh->status == 2)
                                                <span>Đã thanh toán đơn hàng</span>
                                                @else
                                                <span>Đã hủy</span>
                                                @endif
                                            </td>
                                            <td class="order-total" data-title="Tổng tiền">
                                                {{number_format($lichsudh->totalPrice)}}VNĐ
                                            </td>
                                          
                                            <td class="order-actions" data-title="Thao tác">
                                                <a href="{{route('dathang.chitietdh',$lichsudh->id)}}" class="button view">Xem</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@stop
