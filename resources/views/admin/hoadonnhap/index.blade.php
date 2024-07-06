@extends('master.ad')
@section('title', 'Dashboard')
@section('main')

    @if (session('ok'))
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
            <a href="{{ route('hoadonnhap.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> ADD NEW</a>
        </form>


    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Stt</th>
                <th>Mã nhà phân phối </th>
                <th>Kiểu thanh toán</th>
                <th>Mã tài khoản</th>
                <th>Tổng tiền</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($hoadonnhap as $hdn)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $hdn->maNhaPhanPhoi }} </td>
                    <td>{{ $hdn->kieuthanhtoan }} </td>
                    <td>{{ $hdn->maTaiKhoan }} </td>
                    <td>{{ number_format($hdn->tongtien) }} </td>
                    <td>
                        <form action="{{ route('hoadonnhap.destroy', $hdn->id) }}" method="post" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa không?')"><i class="fa fa-trash"></i></button>
                            <a href="{{ route('hoadonnhap.detail', $hdn->id) }}" class="btn btn-sm btn-primary">
                                <i
                                    class="fa fa-edit">
                                </i>
                            </a>
                        </form> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop()

{{-- <td>
        {{-- <form action="{{ route('loaisp.destroy', $lsp->id) }}" method="post" >
            @csrf
            @method('DELETE')
            <a href="{{ route('loaisp.edit', $lsp->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa không?')"><i class="fa fa-trash"></i></button>
        </form> --}}
{{-- </td> --}}
