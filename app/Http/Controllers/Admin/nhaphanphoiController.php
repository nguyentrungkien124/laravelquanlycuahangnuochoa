<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\nhaphanphoi;
use Illuminate\Http\Request;

class nhaphanphoiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nhaphanphoi = Nhaphanphoi::all();
         return view('admin.nhaphanphoi.index',compact('nhaphanphoi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.nhaphanphoi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
         $request->validate([
            'TenNPP' => 'required|min:4|max:150|unique:nhaphanphoi',
            'DiaChi' => 'required|min:4|max:150|',
            'Email' => 'required',
            'SoDienThoai' => 'required|min:4|max:150|'

        ]);
         $nhaphanphoiData = $request->only('TenNPP','DiaChi','Email','SoDienThoai');

         if(Nhaphanphoi::create($nhaphanphoiData)){
            return redirect()->route('nhaphanphoi.index')->with('ok','thêm thành công');

        }
         return redirect()->back()->with('no','không thành công');
    }

    /**
     * Display the specified resource.
     */
     public function show(nhaphanphoi $nhaphanphoi)
     {
 
     }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(nhaphanphoi $nhaphanphoi)
    {
        return view('admin.nhaphanphoi.edit',compact('nhaphanphoi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, nhaphanphoi $nhaphanphoi)
    {
        $request->validate([
            'TenNPP' => 'required|min:4|max:150|unique:nhaphanphoi',
            'DiaChi' => 'required|min:4|max:150|',
            'Email' => 'required',
            'SoDienThoai' => 'required|min:4|max:150|'
        ]);
        $nhaphanphoiData=[
            'TenNPP' => $request-> TenNPP,
            'DiaChi' => $request-> DiaChi,
            'Email' => $request-> Email,
            'SoDienThoai' => $request-> SoDienThoai
        ];
        
        if ($nhaphanphoi->update($nhaphanphoiData)){
            return redirect()->route('nhaphanphoi.index')->with('ok','cập nhật thành công');

        }
        return redirect()->back()->with('no','cập nhật không thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(nhaphanphoi $nhaphanphoi)
    {
        if ($nhaphanphoi->delete()){
            return redirect()->route('nhaphanphoi.index')->with('ok','xóa thành công');
        }
        return redirect()->back()->with('no','không thành công');
    }
}
