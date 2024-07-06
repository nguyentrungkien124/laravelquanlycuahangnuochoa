<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chitiethoadonnhap;
use App\Models\Hoadonnhap;
use App\Models\Nhaphanphoi;
use App\Models\Sanpham;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class hoadonnhapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $hoadonnhap = Hoadonnhap::all();
        return view('admin.hoadonnhap.index', compact('hoadonnhap'));
    }

    public function detail($id)
{
    $hoadonnhap = Hoadonnhap::with('chitiets.sanpham')->find($id);
    // dd($hoadonnhap);
    return view('admin.hoadonnhap.detail', compact('hoadonnhap'));
}

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $currentUser = Auth::user();
        $matk = Nhaphanphoi::all();
        $nhaps = Sanpham::orderBy('tensp', 'ASC')->select('id', 'tensp')->get();
        return view('admin.hoadonnhap.create', compact('nhaps', 'matk', 'currentUser'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Kiểm tra hợp lệ
        $validatedData = $request->validate([
            'maNhaPhanPhoi' => 'required|integer',
            'kieuthanhtoan' => 'required|string',
            'maTaiKhoan' => 'required|integer',
            'tongtien' => 'required|numeric',
            'chitiets.*.sanpham_id' => 'required|integer',
            'chitiets.*.soLuong' => 'required|integer',
            'chitiets.*.giaNhap' => 'required|numeric',
        ]);

        // Tạo hóa đơn nhập
        $hoadonnhap = Hoadonnhap::create([
            'maNhaPhanPhoi' => $request->maNhaPhanPhoi,
            'kieuthanhtoan' => $request->kieuthanhtoan,
            'maTaiKhoan' => $request->maTaiKhoan,
            'tongtien' => 0, // Khởi tạo tổng tiền bằng 0
        ]);

        // Lưu chi tiết hóa đơn nhập và cập nhật số lượng sản phẩm
        $tongtien = 0;
        foreach ($request->chitiets as $chitiet) {
            $sanpham = Sanpham::find($chitiet['sanpham_id']);
            if ($sanpham) {
                // Cập nhật số lượng sản phẩm
                $sanpham->soluong += $chitiet['soLuong'];
                $sanpham->gia +=$chitiet['giaNhap']*1.2;
                $sanpham->save();

                // Lưu chi tiết hóa đơn nhập
                $chitiethoadonnhap = Chitiethoadonnhap::create([
                    'maHoaDon' => $hoadonnhap->id,
                    'sanpham_id' => $chitiet['sanpham_id'],
                    'soLuong' => $chitiet['soLuong'],
                    'giaNhap' => $chitiet['giaNhap'],
                    // Không cần lưu 'tongtien' vì đã là cột GENERATED
                ]);

                // Cộng dồn tổng tiền
                $tongtien += $chitiet['soLuong'] * $chitiet['giaNhap'];
            }
        }

        // Cập nhật tổng tiền hóa đơn nhập
        $hoadonnhap->tongtien = $tongtien;
        $hoadonnhap->save();

        return redirect()->route('hoadonnhap.index')->with('ok', 'Hóa đơn nhập đã được tạo thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //     return view('admin.loaisp.edit',compact('loaisp'));
    }

    /**
     * Update the specified resource in storage.
     */
    //     public function update(Request $request, loaisp $loaisp)
    //     {
    //         $request->validate([
    //             'tenlsp'=> 'required|min:4|max:150|unique:loaisp'
    //         ]);
    //         $loaispData=[
    //             'tenlsp' => $request-> tenlsp
    //         ];

    //         if ($loaisp->update($loaispData)){
    //             return redirect()->route('loaisp.index')->with('ok','cập nhật thành công');

    //         }
    //         return redirect()->back()->with('no','cập nhật không thành công');
    //     }

      /**
         * Remove the specified resource from storage.
     */
        public function destroy(Hoadonnhap $hoadonnhap)
        {
            if ($hoadonnhap->delete()){
                return redirect()->route('hoadonnhap.index')->with('ok','xóa thành công');
            }
            return redirect()->back()->with('no','không thành công');
        }
}
