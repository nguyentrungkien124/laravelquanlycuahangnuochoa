<?php

namespace App\Http\Controllers;

use App\Models\Sanpham;
use App\Models\Giohang;
use Illuminate\Http\Request;

class GiohangController extends Controller
{
    public function index()
    {
        // $giohangs = Giohang::where('khachhang_id',auth('cus')->id())->get();
        return view('home.giohang');
    }
    public function add(Sanpham $sanpham, Request $req)
    {
        $soluong = $req->soluong ? $req->soluong : 1;
        $kh_id = auth('cus')->id();
        $giohangExist = Giohang::where([
            'khachhang_id' =>  $kh_id,
            'sanpham_id' => $sanpham->id
        ])->first();

        if ($giohangExist) {
            Giohang::where([
                'khachhang_id' =>  $kh_id,
                'sanpham_id' => $sanpham->id
            ])->increment('soluong', $soluong);
            // $giohangExist->update([
            //     'soluong'=> $giohangExist ->soluong +1
            // ]);
            return redirect()->route('giohang.index')->with('ok', 'Thêm số lượng sản phẩm thành công');
        } else {

            $data = [
                'khachhang_id' => auth('cus')->id(),
                'sanpham_id' => $sanpham->id,
                'gia' => $sanpham->giakm ? $sanpham->giakm : $sanpham->gia,
                'soluong' =>  $soluong
            ];
            if (Giohang::create($data)) {
                return redirect()->route('giohang.index')->with('ok', 'Thêm thành công giỏ hàng');
            }
        }

        return redirect()->back()->with('no ', 'Lỗi');
    }

    public function update(Sanpham $sanpham, Request $req)
    {
        $soluong = $req->soluong ? floor($req->soluong) : 1;
        $kh_id = auth('cus')->id();
        $giohangExist = Giohang::where([
            'khachhang_id' =>  $kh_id,
            'sanpham_id' => $sanpham->id
        ])->first();

        if ($giohangExist) {
            Giohang::where([
                'khachhang_id' =>  $kh_id,
                'sanpham_id' => $sanpham->id
            ])->update([
                'soluong' => $soluong
            ]);

            return redirect()->route('giohang.index')->with('ok', 'Sửa số lượng sản phẩm thành công');
        }
        

        return redirect()->back()->with('no', 'Lỗi');
    }

    public function delete($sanpham_id)
    {
        $kh_id = auth('cus')->id();
        Giohang::where([
            'khachhang_id' =>  $kh_id,
            'sanpham_id' => $sanpham_id
        ])->delete();
        return redirect()->route('giohang.index')->with('ok', 'Xóa thành công');
    }
    public function clear()
    {
        $kh_id = auth('cus')->id();
        Giohang::where([
            'khachhang_id' =>  $kh_id
        ])->delete();
        return redirect()->back()->with('ok', 'Xóa thành công');
    }
}
