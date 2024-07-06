@extends('master.ad')
@section('title', 'Thêm sản phẩm')
@section('main')

<form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data" class="col-md-9">
    @csrf
    <div class="col-md-9">

        <legend>KIÊN</legend>

        <div class="form-group">
            <label for="title">Mục blogs</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Nhập thông tin">
        </div>
        
        <div class="form-group">
            <label for="content_title">Tiêu đề blogs</label>
            <input type="text" name="content_title" class="form-control" id="content_title" placeholder="Nhập thông tin">
        </div>
        
        <div class="form-group">
            <label for="ghichu">Nội dung</label>
            <textarea type="text" name="ghichu" class="form-control" id="ghichu" placeholder="Nhập thông tin"></textarea>
        </div>

        <div class="form-group">
            <label for="user_id">Người thêm</label>
            <select name="user_id" class="form-control" id="user_id">
                <option value="">Chọn người thêm</option>
                @foreach($nguoidang as $ng)
                <option value="{{ $ng->id }}">{{ $ng->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="hinhanh">Hình ảnh</label>
            <input type="file" name="hinhanh" class="form-control" id="hinhanh" placeholder="Nhập thông tin">
        </div>

        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
    </div>

    
</form>
</div>

@stop