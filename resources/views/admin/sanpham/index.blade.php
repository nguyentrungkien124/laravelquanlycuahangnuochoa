@extends('master.ad')
@section('title','Dashboard')
@section('main')


@if(session('ok'))
<div class="alert alert-success" id="success-alert">
    {{ session('ok') }}
</div>

<script>
    // Sử dụng setTimeout để ẩn thông báo sau 3 giây (3000 ms)
    setTimeout(function() {
        document.getElementById('success-alert').style.display = 'none';
    }, 1000);
</script>
@endif

<form action="{{ route('search') }}" method="POST" class="form-inline" role="form">
    @csrf
    <div class="form-group">
        <label class="sr-only" for="search">Tìm kiếm</label>
        <input type="text" class="form-control" id="search" name="search" placeholder="Nhập sản phẩm cần tìm">
    </div>
    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Tìm kiếm</button>
    <a href="{{route('sanpham.create')}}" class="btn btn-primary"><i class="fa fa-plus">ADD NEW</i></a>
</form>


<table class="table table-hover">
    <thead>
        <tr>
            <th>Stt</th>
            <th>Tên sản phẩm </th>
            <th>Loại sản phẩm</th>
            <th>Hãng</th>
            <th>Giá</th>
            <th>Giá KM</th>
            <th>Hình ảnh</th>
            <th>Số lượng </th>
            <th>Mô tả</th>
        </tr>
    </thead>

    <tbody>
        @foreach($sanpham as $sp)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$sp->tensp}} </td>
            <td>
                @if($sp->cat)
                    {{$sp->cat->tenlsp}}
                @else
                    KHÔNG HIỆN
                @endif
            </td>
            <td>{{$sp->tenhang}}</td>
            <td>{{number_format($sp->gia)}}</td>
            <td>{{number_format($sp->giakm)}}</td>
            <td>
                <img src="{{ URL::to('/') }}/uploads/images/{{$sp->hinhanh}}" alt="" width="40">
            </td>
            <td>
                @if ($sp->soluong > 0)
                    {{$sp->soluong}}
                @else
                    <span style="color: red; font-weight: bold;">Hết hàng</span>
                @endif
            </td>
            <td>{{ Str::limit($sp->mota, 5) }}</td> <!-- Giới hạn mô tả đến 50 ký tự -->
            
            <td class="text-right">
                <form action="{{ route('sanpham.destroy', $sp->id) }}" method="post" >
                    @csrf @method('DELETE')
                    <a href="{{route('sanpham.edit',$sp->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <button class="btn btn-sm btn-danger" onclick="return confirm('bạn chắc chắn muốn xóa không')"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
    
    </tbody>
</table>

<div class="pagination clearfix style2" >
    <div style="margin-left: 527px;"> 
    {{ $sanpham->links('pagination::bootstrap-4') }}
    </div>
  
</div>

@stop
