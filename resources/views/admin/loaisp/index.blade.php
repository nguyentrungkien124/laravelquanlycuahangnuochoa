@extends('master.ad')
@section('title','Dashboard')
@section('main')

@if(session('ok'))
    <div class="alert alert-success">
      {{ session('ok') }}
    </div>
@endif


<div class="d-flex justify-content-between mb-3">
    <form action="" method="POST" class="form-inline" role="form">

        <div class="form-group">
            <label class="sr-only" for="">label</label>
            <input type="email" class="form-control" id="" placeholder="Input field">
        </div>

        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
        <a href="{{ route('loaisp.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> ADD NEW</a>
    </form>

 
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Stt</th>
            <th>Tên loại sản phẩm </th>
        </tr>
    </thead>

    <tbody>
        @foreach($loaisp as $lsp)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$lsp->tenlsp}} </td>
            <td>
                <form action="{{ route('loaisp.destroy', $lsp->id) }}" method="post" >
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('loaisp.edit', $lsp->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa không?')"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop()
