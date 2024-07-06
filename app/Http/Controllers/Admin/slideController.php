<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\slide;
use Illuminate\Http\Request;

class slideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slide = Slide::all();
        return view('admin.slide.index', compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tenslide' => 'required|min:4|max:150|unique:slide',
            'hinhanh' => 'required|file|mimes:jpg,png,gif,jpeg',
            'gia' => 'required|numeric'
        ]);
    
        // Lấy thông tin của ảnh từ request
        $imageName = $request->file('hinhanh')->hashName();
    
        // Di chuyển ảnh vào thư mục lưu trữ
        $request->file('hinhanh')->move(public_path('uploads/images/'), $imageName);
    
        // Tạo dữ liệu mới cho slide
        $slideData = [
            'tenslide' => $request->tenslide,
            'image' => $imageName, // Đảm bảo rằng bạn sử dụng 'image' thay vì 'hinhanh' để tương thích với tên cột trong cơ sở dữ liệu
            'gia' => $request->gia
        ];
    
        // Tạo slide mới trong cơ sở dữ liệu
        if (Slide::create($slideData)) {
            return redirect()->route('slide.index')->with('ok', 'Thêm thành công');
        } else {
            return redirect()->back()->with('no', 'Không thành công');
        }
    }    
    


    /**
     * Display the specified resource.
     */
    public function show(slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(slide $slide)
    {
        return view('admin.slide.edit',compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, slide $slide)
    {
        $request->validate([
            'tenslide' => 'required|min:4|max:150|unique:slide,tenslide,' . $slide->id,
            'image'=>'image|mimes:jpg,png,gif,jpeg|max:2048',
            'gia'=>'required|numeric'
        ]);

        $slideData =[
            'tenslide'=>$request->tenslide,
            'gia'=>$request->gia,
        ];
        
        if($request->hasFile('image')){
            $imageName = $request->image->hashName();
            $request->image->move(public_path('uploads/images/'),$imageName);
            $slideData['image']=$imageName;
        }
        if($slide->update($slideData)){
            // dd($slideData);
            return redirect()->route('slide.index')->with('ok','thêm thành công');
        }
        return redirect()->back()->with('no','Cập nhật không thành công');
    }   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(slide $slide)
    {
        if($slide->delete()){
            
            return redirect()->route('slide.index')->with('ok','xoá thành công');
        }
        return redirect()->back()->with('no','Xóa không thành công');
    }
}
