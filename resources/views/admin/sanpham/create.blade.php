@extends('master.ad')
@section('title', 'Thêm sản phẩm')
@section('main')

<form action="{{ route('sanpham.store') }}" method="POST" enctype="multipart/form-data" class="col-md-9">
    @csrf
    <div class="col-md-9">

        <legend>KIÊN</legend>

        <div class="form-group">
            <label for="tensp">Tên sản phẩm</label>
            <input type="text" name="tensp" class="form-control" id="tensp" placeholder="Nhập thông tin">
        </div>

        <div class="form-group">
            <label for="id_loai">Loại sản phẩm</label>
            <select name="id_loai" class="form-control" id="id_loai">
                <option value="">Chọn loại sản phẩm</option>
                @foreach($cats as $cat)
                <option value="{{ $cat->id }}">{{ $cat->tenlsp }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tenhang">Hãng</label>
            <input type="text" name="tenhang" class="form-control" id="tenhang" placeholder="Nhập thông tin">
        </div>

        <div class="form-group">
            <label for="gia">Giá</label>
            <input type="text" name="gia" class="form-control" id="gia" placeholder="Nhập thông tin">
        </div>

        <div class="form-group">
            <label for="giakm">Giá KM</label>
            <input type="text" name="giakm" class="form-control" id="giakm" placeholder="Nhập thông tin">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="hinhanh">Hình ảnh</label>
            <input type="file" name="hinhanh" class="form-control" id="hinhanh" placeholder="Nhập thông tin">
        </div>

        <div class="form-group">
            <label for="soluong">Số lượng</label>
            <input type="text" name="soluong" class="form-control" value="1" id="sl" placeholder="Nhập thông tin">
        </div>
        <div class="form-group">
            <label for="mota">Mô tả</label>
            <input type="text" name="mota" class="form-control"  id="mota" placeholder="Nhập thông tin">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
    </div>

    
</form>
</div>

@stop