<h3>Hi:{{$dathang->khachhang->tenkh}}</h3>
<p>
    Vui lòng verity để xác nhận đơn hàng 
</p>

<h4>Chi tiết đơn hàng của bạn là</h4>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>STT</th>
        <th>Tên SP</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Tổng tiền</th>
    </tr>
    <?php $total = 0;?>
    @foreach($dathang->details as $chitiet)
    <tr>
        <th>{{$loop->index+1}}</th>
        <th>{{$chitiet->sanpham->tensp}}</th>
        <th>{{$chitiet->gia}}</th>
        <th>{{$chitiet->soluong}}</th>
        <th>{{($chitiet->gia)*($chitiet->soluong)}}</th>
        <th></th>
    </tr>
    <?php $total += $chitiet->gia*$chitiet->soluong;?>
    @endforeach
    <tr>
        <th colspan="4">Tổng tiền</th>
        
        <th>{{number_format($total)}}</th>
        <th></th>
    </tr>
    
</table>
<p>
    <a href="{{route('dathang.verify',$token)}}">Click here to verify your order</a>
</p>