@extends('master.ad')
@section('title', 'Sửa loại sản phẩm ' . $loaisp->tenlsp)
@section('main')

<div class="row">
    <form action="{{ route('loaisp.update', $loaisp->id) }}" method="POST" enctype="multipart/form-data" class="col-md-9">
        @csrf
        @method('PUT')
        
        <legend>KIÊN</legend>
    
        <div class="form-group">
            <label for="tenlsp">Tên loại sản phẩm</label>
            <input type="text" name="tenlsp" class="form-control" value="{{$loaisp->tenlsp}}">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
    </form>
</div>

@stop
