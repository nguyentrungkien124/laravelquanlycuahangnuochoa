@extends('master.ad')
@section('title', 'Thêm nhà phân phối')
@section('main')

<div class="row">
    <form action="{{ route('nhaphanphoi.store') }}" method="POST"   nbn enctype="multipart/form-data" class="col-md-9">
        @csrf
        
        <legend>From</legend>
    
        <div class="form-group">
            <label for="TenNPP">Tên nhà phân phối</label>
            <input type="text" name="TenNPP" class="form-control" id="tensp" placeholder="Nhập thông tin">
        </div>
        
        <div class="form-group">
            <label for="DiaChi">Địa chỉ</label>
            <input type="text" name="DiaChi" class="form-control" id="tensp" placeholder="Nhập thông tin">
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="text" name="Email" class="form-control" id="tensp" placeholder="Nhập thông tin">
        </div>
    
        <div class="form-group">
            <label for="SoDienThoai">Số điện thoại</label>
            <input type="text" name="SoDienThoai" class="form-control" id="tensp" placeholder="Nhập thông tin">
        </div>
    
    

        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
    </form>
</div>

@stop
