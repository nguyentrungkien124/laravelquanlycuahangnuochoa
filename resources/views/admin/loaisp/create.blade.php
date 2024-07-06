@extends('master.ad')
@section('title', 'Thêm loại sản phẩm')
@section('main')

<div class="row">
    <form action="{{ route('loaisp.store') }}" method="POST"   nbn enctype="multipart/form-data" class="col-md-9">
        @csrf
        
        <legend>KIÊN</legend>
    
        <div class="form-group">
            <label for="tenlsp">Tên loại sản phẩm</label>
            <input type="text" name="tenlsp" class="form-control" id="tensp" placeholder="Nhập thông tin">
        </div>

        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
    </form>
</div>

@stop
