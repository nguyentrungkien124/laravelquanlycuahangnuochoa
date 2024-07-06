@extends('master.ad')
@section('title', 'Dashboard')
@section('main')

@if (session('ok'))
    <div class="alert alert-success" id="success-alert">
        {{ session('ok') }}
    </div>

    <script>
        // Sử dụng setTimeout để ẩn thông báo sau 3 giây (3000 ms)
        setTimeout(function() {
            document.getElementById('success-alert').style.display = 'none';
        }, 3000); // Đổi thành 3000 để ẩn sau 3 giây
    </script>
@endif

<form action="" method="POST" class="form-inline" role="form">
    <div class="form-group">
        <label class="sr-only" for="">label</label>
        <input type="email" class="form-control" id="" placeholder="Input field">
    </div>
    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    <a href="{{ route('blogs.create') }}" class="btn btn-primary"><i class="fa fa-plus">ADD NEW</i></a>
</form>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Stt</th>
            <th>Mục blogs</th>
            <th>Tiêu đề blogs</th>
            <th>Nội dung</th>
            <th>Người thêm</th>
            <th>Hình ảnh</th>
            <th>Hành động</th> <!-- Thêm cột hành động -->
        </tr>
    </thead>

    <tbody>
        @foreach ($blogs as $bl)
        <tr>
            {{-- @dd($blogs) --}}
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $bl->title }} </td>
                <td>{{ $bl->content_title }}</td>
                <td>{{ Str::limit($bl->ghichu, 5) }}</td>
                <td>
                    @if ($bl->user)
                        {{ $bl->user->name }}
                    @else
                        KHÔNG HIỆN
                    @endif
                </td>
                <td>
                    <img src="{{ URL::to('/') }}/uploads/images/{{ $bl->hinhanh }}" alt="" width="40">
                </td>
                <td>
                    <a href="{{route('blogs.edit',$bl->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <form action="{{route('blogs.destroy',$bl->id)}}" method="post" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa không?')"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@stop
