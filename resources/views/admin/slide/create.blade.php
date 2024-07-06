@extends('master.ad')
@section('title', 'Thêm slide')
@section('main')

<div class="row">
    <form action="{{ route('slide.store') }}" method="POST" enctype="multipart/form-data" class="col-md-9">
        @csrf
        
        <legend>KIÊN</legend>
    
        <div class="form-group">
            <label for="tenslide">Tên slide</label>
            <input type="text" name="tenslide" class="form-control" id="tenslide" placeholder="Nhập thông tin">
        </div>

        <div class="form-group">
            <label for="hinhanh">Hình ảnh</label>
            <input type="file" name="hinhanh" class="form-control" id="hinhanh" placeholder="Nhập thông tin">
        </div>

        <div class="form-group">
            <label for="gia">Giá</label>
            <input type="text" name="gia" class="form-control" id="gia" placeholder="Nhập thông tin">
        </div>


        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
    </form>
</div>

@stop
