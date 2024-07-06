@extends('master.ad')
@section('title', 'Sửa trang blog')
@section('main')

<form action="{{ route('blogs.update',$blog->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="col-md-9">

        <legend>KIÊN</legend>

        <div class="form-group">
            <label for="title">Mục blog</label>
            <input type="text" name="title" class="form-control" value="{{$blog->title}}">
        </div>

        
        <div class="form-group">
            <label for="content_title">Tiêu đề blog</label>
            <input type="text" name="content_title" class="form-control" value="{{$blog->content_title}} ">
        </div>
        
        <div class="form-group">
            <label for="ghichu">Nội dung</label>
            <input type="text" name="ghichu" class="form-control" value="{{$blog->ghichu}} ">
        </div>
        <div class="form-group">
            <label for="user_id">Người đăng</label>
            <select name="user_id" class="form-control" id="user_id">
                <option value="">Chọn loại sản phẩm</option>
                @foreach($nguoidang as $ng)
                <option value="{{ $ng->id }}" {{$ng->id == $blog -> user_id ? 'selected' : ''}}>{{ $ng->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="hinhanh">Hình ảnh</label>
            <input type="file" name="hinhanh" class="form-control" id="hinhanh">
            <img src="uploads/images/{{$blog->hinhanh}}" width="80%" style="margin-left: 30px;">

        </div>

       
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
    </div>
</form>
</div>

@stop