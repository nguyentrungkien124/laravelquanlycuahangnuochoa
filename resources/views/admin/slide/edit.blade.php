@extends('master.ad')
@section('title', 'Sửa sản phẩm ' . $slide->tenslide)
@section('main')

<div class="row">
    <form action="{{ route('slide.update', $slide->id) }}" method="POST" enctype="multipart/form-data" class="col-md-9">
        @csrf
        @method('PUT')

        <legend>KIÊN</legend>

        <div class="form-group">
            <label for="tenslide">Tên slide</label>
            <input type="text" name="tenslide" class="form-control" id="tenslide" value="{{ $slide->tenslide }}" placeholder="Nhập thông tin">
        </div>
        <div class="form-group">
            <label for="image">Hình ảnh</label>
            <input type="file" name="image" class="form-control" id="image" placeholder="Nhập thông tin">
            <img src="{{ asset('uploads/images/' . $slide->image) }}" width="30%">
        </div>


        <div class="form-group">
            <label for="gia">Giá</label>
            <input type="text" name="gia" class="form-control" id="gia" value="{{ $slide->gia }}" placeholder="Nhập thông tin">
        </div>

        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
    </form>
</div>

@stop