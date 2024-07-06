@extends('master.ad')
@section('title', 'Sửa sản phẩm ' . $sanpham->tensp)
@section('main')

<form action="{{ route('sanpham.update',$sanpham->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="col-md-9">

        <legend>KIÊN</legend>

        <div class="form-group">
            <label for="tensp">Tên sản phẩm</label>
            <input type="text" name="tensp" class="form-control" value="{{$sanpham->tensp}}">
        </div>

        <div class="form-group">
            <label for="id_loai">Loại sản phẩm</label>
            <select name="id_loai" class="form-control" id="id_loai">
                <option value="">Chọn loại sản phẩm</option>
                @foreach($cats as $cat)
                <option value="{{ $cat->id }}" {{$cat->id == $sanpham -> id_loai ? 'selected' : ''}}>{{ $cat->tenlsp }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tenhang">Hãng</label>
            <input type="text" name="tenhang" class="form-control" value="{{$sanpham->tenhang}} ">
        </div>

        <div class="form-group">
            <label for="gia">Giá</label>
            <input type="text" name="gia" class="form-control" value="{{$sanpham->gia}} ">
        </div>
        <div class="form-group">
            <label for="giakm">Giá KM</label>
            <input type="text" name="giakm" class="form-control" value="{{$sanpham->giakm}} ">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="hinhanh">Hình ảnh</label>
            <input type="file" name="hinhanh" class="form-control" id="hinhanh">
            <img src="uploads/images/{{$sanpham->hinhanh}}" width="80%" style="margin-left: 30px;">

        </div>

        <div class="form-group">
            <label for="soluong">Số lượng</label>
            <input type="text" name="soluong" class="form-control" value="{{$sanpham->soluong}} ">

        </div>
        <div class="form-group">
            <label for="mota">Mô tả</label>
            <input type="text" name="mota" class="form-control" value="{{$sanpham->mota}} ">

        </div>

        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
    </div>
</form>
</div>

@stop