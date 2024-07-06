@extends('master.ad')

@section('title', 'Dashboard')

@section('main')
<div class="row">
    @if(session('ok'))
    <div class="alert alert-success">
        {{ session('ok') }}
    </div>
    @endif
    <div class="col-lg-12">
        <form action="{{ route('admin.index') }}" method="GET" class="form-inline">
            <div class="form-group mb-2">
                <label for="start_date" class="sr-only">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ request('start_date') }}">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="end_date" class="sr-only">End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ request('end_date') }}">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
    </div>
</div>

<div class="row" style="margin-top: 20px">
    <!-- Display sales summary -->
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-purple">
            <div class="inner">
                <h3>{{ number_format($salesTotal, 0, ',', '.') }} VND</h3>
                <p>Tổng tiền đặt hàng</p>
            </div>
            <div class="icon">
                <i class="ion ion-cash"></i>
            </div>
        </div>
    </div><!-- ./col -->

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{ $totalOrders }}</h3>
                <p>Tổng đơn đặt hàng</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
          
        </div>
    </div><!-- ./col -->

    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{ $pendingOrders }}</h3>
                <p>Chưa xác nhận đơn</p>
            </div>
            <div class="icon">
                <i class="ion ion-clock"></i>
            </div>
            
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ $confirmedOrders }}</h3>
                <p>Đơn đã xác nhận</p>
            </div>
            <div class="icon">
                <i class="ion ion-checkmark-circled"></i>
            </div>
            
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-blue">
            <div class="inner">
                <h3>{{ $goodOrders }}</h3>
                <p>Đơn đã giao</p>
            </div>
            <div class="icon">
                <i class="ion ion-card"></i>
            </div>
            
        </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-blue">
            <div class="inner">
                <h3>{{ $userMoi }}</h3>
                <p>Khách hàng </p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h2>Top 10 Sản Phẩm Bán Chạy</h2>
        <canvas id="sanphamBanChayChart"></canvas>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var ctx = document.getElementById('sanphamBanChayChart').getContext('2d');
    
    // Extract labels and data
    var labels = @json($products->pluck('tensp'));
    var data = @json($products->pluck('total_sold'));

    var sanphamBanChayChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Số lượng bán',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>
@stop
