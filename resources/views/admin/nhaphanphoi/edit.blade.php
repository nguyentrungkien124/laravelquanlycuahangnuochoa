@extends('master.ad')
@section('title', 'Sửa nhà phân phối' . $nhaphanphoi->TenNPP)
@section('main')

<div class="row">
    <form action="{{ route('nhaphanphoi.update', $nhaphanphoi->MaNPP) }}" method="POST" enctype="multipart/form-data" class="col-md-9">
        @csrf
        @method('PUT')
    
        <legend>KIÊN</legend>
    
        <div class="form-group">
            <label for="TenNPP">Tên nhà phân phối</label>
            <input type="text" name="TenNPP" class="form-control" value="{{$nhaphanphoi->TenNPP}}">
        </div>
        
        <div class="form-group">
            <label for="DiaChi">Địa chỉ</label>
            <input type="text" name="DiaChi" class="form-control" value="{{$nhaphanphoi->DiaChi}}">
        </div>
        
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="text" name="Email" class="form-control" value="{{$nhaphanphoi->Email}}">
        </div>
        
        <div class="form-group">
            <label for="SoDienThoai">Số điện thoại</label>
            <input type="text" name="SoDienThoai" class="form-control" value="{{$nhaphanphoi->SoDienThoai}}">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
    </form>
</div>

@stop
