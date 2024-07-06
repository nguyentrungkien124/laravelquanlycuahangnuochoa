@extends('master.ad')
@section('title','slide')
@section('main')

@if(session('ok'))
    <div class="alert alert-success">
      {{ session('ok') }}
    </div>
@endif

<form action="" method="POST" class="form-inline" role="form">

    <div class="form-group">
        <label class="sr-only" for="">label</label>
        <input type="email" class="form-control" id="" placeholder="Input field">
    </div>
    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    <a href="{{route('slide.create')}}" class="btn btn-primary"><i class="fa fa-plus">ADD NEW</i></a>

</form>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Stt</th>
            <th>Tên Slide</th>
            <th>Hình ảnh</th>
            <th>Giá</th>
        </tr>
    </thead>

    <tbody>
        @foreach($slide as $slides)
        <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$slides->tenslide}} </td>
            <td>
                <img src="{{ URL::to('/') }}/uploads/images/{{$slides->image}}" alt="" width="40">
            </td>
            <td>{{$slides->gia}}</td>
            <td class="text-right">
                
            <form action="{{ route('slide.destroy', $slides->id) }}" method="post" >
                    @csrf @method('DELETE')
                    <a href="{{route('slide.edit',$slides->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <button class="btn btn-sm btn-danger" onclick="return confirm('bạn chắc chắn muốn xóa không')"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@stop();