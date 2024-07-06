<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loaisp;
use App\Models\sanpham;
use Illuminate\Http\Request;

class sanphamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sanpham = Sanpham::paginate(10);
        return view('admin.sanpham.index', compact('sanpham'));
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        // Lọc danh sách sản phẩm theo từ khóa tìm kiếm
        $sanpham = Sanpham::where('tensp', 'like', "%{$searchTerm}%")->paginate(10);

        return view('admin.sanpham.index', compact('sanpham'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = Loaisp::orderBy('tenlsp', 'ASC')->select('id', 'tenlsp')->get();
        return view('admin.sanpham.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tensp' => 'required|min:4|max:150|unique:sanpham',
            'tenhang' => 'required|alpha',
            'gia' => 'required|numeric',
            'giakm' => 'required|lte:gia',
            'hinhanh' => 'required|file|mimes:jpg,png,gif,jpeg,webp',
            'id_loai' => 'required|exists:loaisp,id',
            'soluong' => 'required|numeric',
            'mota'=>'required'

        ]);

        // Lấy các trường cần thiết từ request
        $sanphamData = $request->only('tensp', 'id_loai', 'tenhang', 'gia', 'giakm', 'hinhanh', 'soluong','mota');


        // Xử lý tên file ảnh
        $imageName = $request->hinhanh->hashName();
        $request->hinhanh->move(public_path('/uploads/images/'), $imageName);
        $sanphamData['hinhanh'] = $imageName;

        if (Sanpham::create($sanphamData)) {
            return redirect()->route('sanpham.index')->with('ok', 'thêm thành công');
        }
        return redirect()->back()->with('no', 'không thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(sanpham $sanpham)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sanpham $sanpham)

    {
        $cats = Loaisp::orderBy('tenlsp', 'ASC')->select('id', 'tenlsp')->get();
        return view('admin.sanpham.edit', compact('sanpham', 'cats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sanpham $sanpham)
    {
        $request->validate([
            'tensp' => 'required|min:4|max:150|unique:sanpham,tensp,' . $sanpham->id,
            'tenhang' => 'required|alpha',
            'gia' => 'required|numeric',
            'giakm' => 'required|lte:gia',
            'hinhanh' => 'image|mimes:jpg,png,gif,jpeg|max:2048', // Specify 'image' instead of 'file'
            'id_loai' => 'required|exists:loaisp,id',
            'soluong' => 'required|numeric',
            'mota'=>'required'
        ]);

        // Create an array to store only the fields that need to be updated
        $sanphamData = [
            'tensp' => $request->tensp,
            'id_loai' => $request->id_loai,
            'tenhang' => $request->tenhang,
            'gia' => $request->gia,
            'giakm' => $request->giakm,
            'soluong' => $request->soluong,
            'mota'=>$request->mota
        ];

        // Handle image upload if a new image is provided
        if ($request->hasFile('hinhanh')) {
            $imageName = $request->hinhanh->hashName();
            $request->hinhanh->move(public_path('uploads/images/'), $imageName);
            $sanphamData['hinhanh'] = $imageName;
        }

        // Update the sanpham record with the new data
        if ($sanpham->update($sanphamData)) {
            return redirect()->route('sanpham.index')->with('ok', 'Cập nhật thành công');
        }
        return redirect()->back()->with('no', 'Cập nhật không thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sanpham $sanpham)
    {
        if ($sanpham->delete()) {
            return redirect()->route('sanpham.index')->with('ok', 'xóa thành công');
        }
        return redirect()->back()->with('no', 'không thành công');
    }
}
