<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chitietdathang;
use App\Models\Dathang;
use App\Models\Sanpham;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use App\Models\User;
class AdminController extends Controller
{
    public function index(Request $request)

    {
        $salesTotal = 0;

        // Kiểm tra xem có dữ liệu ngày bắt đầu và ngày kết thúc hay không
        if ($request->has(['start_date', 'end_date'])) {
            $startDate = Carbon::parse($request->input('start_date'));
            $endDate = Carbon::parse($request->input('end_date'))->endOfDay(); // Kết thúc ngày

            // Tính tổng doanh thu trong khoảng thời gian được chọn
            $salesTotal = Dathang::whereBetween('created_at', [$startDate, $endDate])
                ->where('status', 2) // Giả sử trạng thái 2 là đã thanh toán
                ->with('details')
                ->get()
                ->sum(function ($order) {
                    return $order->details->sum(function ($detail) {
                        return $detail->gia * $detail->soluong;
                    });
                });
        }

       // Lấy dữ liệu sản phẩm bán chạy với số lượng mua lớn hơn 2
       $products = Sanpham::with('cat')
       ->withCount('chitietdathangs as total_sold')
       ->get()
       ->filter(function ($product) {
           return $product->total_sold > 2; // Lọc các sản phẩm bán được hơn 2 đơn vị
       })
       ->sortByDesc('total_sold') // Sắp xếp giảm dần theo số lượng bán
       ->take(10); // Lấy 10 sản phẩm bán chạy nhất


        return view('admin.index',compact('products','salesTotal'));
    }
    public function login()
    {
        // User::create([
        //     'name'=> 'kien',
        //     'email' => 'ad@gmail.com',
        //     'password' => bcrypt(1)
        // ]);
        return view('admin.login');
    }
    public function check_login(Request $req)
    {

        $req->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);
        $data = $req->only('email', 'password');

        $check = auth()->attempt($data);
        if ($check) {
            return redirect()->route('admin.index')->with('ok', 'xin chào ADMIN');
        }
        return redirect()->back()->with('no', 'vui lòng nhập lại mật khẩu hoặc tài khoản');
    }
    public function logout()
    {

        auth()->logout();
        return redirect()->route('admin.login')->with('ok', 'logout');
    }
    // public function daspord(Request $request)
    // {
    //     // Khởi tạo giá trị mặc định
    //     $salesTotal = 0;

    //     // Kiểm tra xem có dữ liệu ngày bắt đầu và ngày kết thúc hay không
    //     if ($request->has(['start_date', 'end_date'])) {
    //         $startDate = Carbon::parse($request->input('start_date'));
    //         $endDate = Carbon::parse($request->input('end_date'))->endOfDay(); // Kết thúc ngày

    //         // Tính tổng doanh thu trong khoảng thời gian được chọn
    //         $salesTotal = Dathang::whereBetween('created_at', [$startDate, $endDate])
    //             ->where('status', 2) // Giả sử trạng thái 2 là đã thanh toán
    //             ->with('details')
    //             ->get()
    //             ->sum(function ($order) {
    //                 return $order->details->sum(function ($detail) {
    //                     return $detail->gia * $detail->soluong;
    //                 });
    //             });
    //     }

    //     // Lấy dữ liệu sản phẩm bán chạy
    //     $data = Dathang::with('details.sanpham')
    //         ->where('status', 2) // Giả sử trạng thái 2 là đã thanh toán
    //         ->get()
    //         ->flatMap->details
    //         ->groupBy('sanpham_id')
    //         ->map(function ($group) {
    //             return $group->sum('soluong');
    //         })
    //         ->sortDesc()
    //         ->take(10);

    //     $sanphamNames = Sanpham::whereIn('id', $data->keys())->pluck('tensp', 'id');

    //     return view('admin.index', compact('salesTotal', 'data', 'sanphamNames'));
    // }
}


