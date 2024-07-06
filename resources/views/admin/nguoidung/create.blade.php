@extends('master.ad')
@section('title', 'Thêm người dùng')
@section('main')

<div class="row">
    <form action="{{ route('nguoidung.store') }}" method="POST"   nbn enctype="multipart/form-data" class="col-md-9">
        @csrf
        
        <legend>From</legend>
    
        <div class="form-group">
            <label for="tenkh">Tên khách hàng</label>
            <input type="text" name="tenkh" class="form-control" id="tenkh" placeholder="Nhập thông tin">
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="text" name="password" class="form-control" id="password" placeholder="Nhập thông tin">
        </div>

        <div class="form-group">
            <label for="diachi">Địa chỉ</label>
            <input type="text" name="diachi" class="form-control" id="diachi" placeholder="Nhập thông tin">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Nhập thông tin">
        </div>
    
        <div class="form-group">
            <label for="sodt">Số điện thoại</label>
            <input type="text" name="sodt" class="form-control" id="sodt" placeholder="Nhập thông tin">
        </div>
    
    

        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
    </form>
</div>

@stop
