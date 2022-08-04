<?php

namespace App\Http\Controllers;

use App\Models\Danhmuc;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DanhmucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhmuc = Danhmuc::paginate(10);
        return view('admincp.danhmuc.list', compact('danhmuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.danhmuc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
        $data = $request->validate([
            'tendanhmuc' => 'required|unique:danhmuc',           
            'kichhoat' => 'required'
        ],[
            'tendanhmuc.required' => 'Tên danh mục không được để trống',           
            'tendanhmuc.unique' => 'Tên danh mục đã tồn tại'
        ]);
        $danhmuc = new Danhmuc();
        $danhmuc->tendanhmuc = $request->tendanhmuc;
        $danhmuc->mota = $request->mota;
        $danhmuc->kichhoat = $request->kichhoat;
        $danhmuc->slug_danhmuc = Str::slug($request->tendanhmuc);
        $danhmuc->save();
        return redirect()->route('danhmuc.index')->with('success', 'Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $danhmuc = Danhmuc::find($id);
        return view('admincp.danhmuc.edit', compact('danhmuc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');     
    }
    public function update(Request $request, $id)
    {      
        $data = $request->validate([           
            'tendanhmuc' => 'required|unique:danhmuc,tendanhmuc,'.$id,           
            'kichhoat' => 'required'
        ],[
            'tendanhmuc.required' => 'Tên danh mục không được để trống',         
            'tendanhmuc.unique' => 'Tên danh mục đã tồn tại'            
        ]);
        $danhmuc = Danhmuc::find($id);
        $danhmuc->tendanhmuc = $data['tendanhmuc'];
        $danhmuc->slug_danhmuc = Str::slug($danhmuc->tendanhmuc);
        $danhmuc->mota = $request->mota;
        $danhmuc->kichhoat = $request->kichhoat;
        $danhmuc->save();
        return redirect()->route('danhmuc.index')->with('success', 'Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Danhmuc::find($id)->delete();
        return redirect()->route('danhmuc.index')->with('success', 'Xóa danh mục thành công');
    }
}
