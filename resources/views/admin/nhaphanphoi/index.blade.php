@extends('master.ad')
@section('title','Dashboard')
@section('main')

@if(session('ok'))
    <div class="alert alert-success">
      {{ session('ok') }}
    </div>
@endif


<div class="d-flex justify-content-between mb-3">
    <form action="" method="POST" class="form-inline" role="form">

        <div class="form-group">
            <label class="sr-only" for="">label</label>
            <input type="email" class="form-control" id="" placeholder="Input field">
        </div>

        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
        <a href="{{ route('nhaphanphoi.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> ADD NEW</a>
    </form>

 
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên nhà phân phối</th>
            <th>Địa chỉ</th>
            <th>Email</th>
            <th>Số điện thoại</th>
        </tr>
    </thead>

    <tbody>
        @foreach($nhaphanphoi as $npp)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$npp->TenNPP}} </td>
            <td>{{$npp->DiaChi}} </td>
            <td>{{$npp->Email}} </td>
            <td>{{$npp->SoDienThoai}}</td>

            <td>
                <form action="{{ route('nhaphanphoi.destroy', $npp->MaNPP) }}" method="post" >
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('nhaphanphoi.edit', $npp->MaNPP) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa không?')"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop()
