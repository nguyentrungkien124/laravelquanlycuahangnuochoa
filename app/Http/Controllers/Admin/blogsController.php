<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\User;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index(){
        $blogs = Blogs::with('user')->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create(){
        $nguoidang = User::orderBy('name', 'ASC')->select('id', 'name')->get();
        return view('admin.blogs.create', compact('nguoidang'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|unique:blogs',
            'content_title' => 'required',
            'user_id' => 'required',
            'hinhanh' => 'required|file|mimes:jpg,png,gif,jpeg',
            'ghichu' => 'required'
        ]);

        $blogsData = $request->only('title', 'content_title', 'user_id', 'ghichu');

        if ($request->hasFile('hinhanh')) {
            $imageName = $request->hinhanh->hashName();
            $request->hinhanh->move(public_path('/uploads/images/'), $imageName);
            $blogsData['hinhanh'] = $imageName;
        }

        if (Blogs::create($blogsData)) {
            return redirect()->route('blogs.index')->with('ok', 'Thêm blogs thành công');
        }

        return redirect()->back()->with('no', 'Không thành công');
    }

    public function edit($id){
        $nguoidang = User::orderBy('name', 'ASC')->select('id', 'name')->get();
        $blog = Blogs::findOrFail($id);
        return view('admin.blogs.edit', compact('nguoidang', 'blog'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|unique:blogs,title,' . $id,
            'content_title' => 'required',
            'user_id' => 'required',
            'hinhanh' => 'file|mimes:jpg,png,gif,jpeg',
            'ghichu' => 'required'
        ]);

        $blogsData = $request->only('title', 'content_title', 'user_id', 'ghichu');
        $blog = Blogs::findOrFail($id);

        if ($request->hasFile('hinhanh')) {
            $imageName = $request->hinhanh->hashName();
            $request->hinhanh->move(public_path('/uploads/images/'), $imageName);
            $blogsData['hinhanh'] = $imageName;
        }

        if ($blog->update($blogsData)) {
            return redirect()->route('blogs.index')->with('ok', 'Cập nhật thành công blogs');
        }

        return redirect()->back()->with('no', 'Cập nhật thất bại');
    }

    public function destroy($id){
        $blog = Blogs::findOrFail($id);
        if ($blog->delete()) {
            return redirect()->route('blogs.index')->with('ok', 'Xóa blogs thành công');
        }

        return redirect()->back()->with('no', 'Xóa blogs thất bại');
    }
}
