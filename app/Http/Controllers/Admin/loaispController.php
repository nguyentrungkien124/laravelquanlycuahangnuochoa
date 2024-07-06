<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\loaisp;
use Illuminate\Http\Request;

class loaispController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loaisp = Loaisp::all();
        return view('admin.loaisp.index',compact('loaisp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.loaisp.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tenlsp' => 'required|min:4|max:150|unique:loaisp'
        ]);
        $loaispData = $request->only('tenlsp');

        if(Loaisp::create($loaispData)){
            return redirect()->route('loaisp.index')->with('ok','thêm thành công');

        }
        return redirect()->back()->with('no','không thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(loaisp $loaisp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(loaisp $loaisp)
    {
        return view('admin.loaisp.edit',compact('loaisp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, loaisp $loaisp)
    {
        $request->validate([
            'tenlsp'=> 'required|min:4|max:150|unique:loaisp'
        ]);
        $loaispData=[
            'tenlsp' => $request-> tenlsp
        ];
        
        if ($loaisp->update($loaispData)){
            return redirect()->route('loaisp.index')->with('ok','cập nhật thành công');

        }
        return redirect()->back()->with('no','cập nhật không thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(loaisp $loaisp)
    {
        if ($loaisp->delete()){
            return redirect()->route('loaisp.index')->with('ok','xóa thành công');
        }
        return redirect()->back()->with('no','không thành công');
    }
}
