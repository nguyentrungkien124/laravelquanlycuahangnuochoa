@extends('master.ad')
@section('title', 'Lịch sử đơn hàng')
@section('main')

    @if (session('ok'))
        <div class="alert alert-success">
            {{ session('ok') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Ngày đặt</th>
                <th>Trạng thái</th>
                <th>Tổng tiền</th>
                <th>Thao tác</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($dathangs as $lichsudh)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $lichsudh->created_at->format('d/m/Y') }}</td>
                    <td>
                        @if ($lichsudh->status == 0)
                            <span>Chưa xác nhận đơn hàng</span>
                        @elseif($lichsudh->status == 1)
                            <span>Đã xác nhận</span>
                        @elseif($lichsudh->status == 2)
                            <span>Đã thanh toán đơn hàng</span>
                        @else
                            <span>Đã hủy</span>
                        @endif
                    </td>
                    <td>
                        {{ number_format($lichsudh->totalPrice) }}VNĐ
                    </td>


                    <td>

                        <a href="{{ route('dathang.detail', $lichsudh->id) }}" class="btn btn-sm btn-primary"><i
                                class="fa fa-edit"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <table class="shop_table">
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
        @foreach ($dathangs as $lichsudh)
            <tr class="order_item">
                <td class="order-id" >{{$loop->index+1}}</td>
                <td class="order-date" data-title="Ngày đặt">{{ $lichsudh->created_at->format('d/m/Y') }}</td>
                <td class="order-status" data-title="Trạng thái">
                    @if ($lichsudh->status == 0)
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
</table> --}}

@stop
