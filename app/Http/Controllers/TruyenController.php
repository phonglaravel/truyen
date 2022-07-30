<?php

namespace App\Http\Controllers;

use App\Models\Danhmuc;
use App\Models\Thuocdanhmuc;
use App\Models\Truyen;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
        



class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
       
    }
    public function index()
    {
        $truyen = Truyen::with('thuocnhieudanhmuc')->orderBy('created_at', 'desc')->paginate(10);
        
        $danhmuc = Danhmuc::all();
       
        
        return view('admincp.truyen.list', compact('truyen', 'danhmuc'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $danhmuc  = Danhmuc::all();
        return view('admincp.truyen.create', compact('danhmuc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->all();
        // dd($data['danhmuc_id']);
        $data = $request->validate([
            'tentruyen' => 'required|unique:truyen',
            'tomtat' => 'required',
            'danhmuc_id' => 'required',
            'image' => 'required',
            'tacgia' => 'required',
            'trangthai' => 'required',
            'tukhoa' => 'required',
            
        ],[
            'tentruyen.required' => 'Không được để trống',
            'tentruyen.unique' => 'Truyện đã tồn tại',
            'tomtat.required' => 'Không được để trống',
            'danhmuc_id.required' => 'Không được để trống',
            'image.required' => 'Không được để trống',
            'tukhoa.required' => 'Không được để trống',
            'tacgia.required' => 'Không được để trống',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_file = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            if (strcasecmp($extension, 'jpg')=== 0
                ||strcasecmp($extension, 'png')=== 0
                ||strcasecmp($extension, 'jepg')=== 0) {
                  $image =Str::random(5). "_" . $name_file;
                while (file_exists("image/posts/". $image))
                  $image = Str::random(5) . "_" . $name_file;
                  $file->move('image/posts', $image);
                }
           }
        
        
        $truyen = new Truyen();
        $truyen->tentruyen = $request->tentruyen;
        $truyen->tukhoa = $request->tukhoa;
        $truyen->slug_truyen = Str::slug($request->tentruyen);
        $truyen->tomtat = $request->tomtat;
        $mang = $request->danhmuc_id;
        foreach($mang as $key => $muc){
            
            
            $truyen->danhmuc_id = $mang[0];
        }
            
        
        
        $truyen->image = $image;
        $truyen->kichhoat = $request->kichhoat;
        $truyen->truyen_noibat = $request->truyen_noibat;
        $truyen->tacgia = $request->tacgia;
        $truyen->luotxem = 0;
        $truyen->trangthai = $request->trangthai;
      
        $truyen->trangthai = $request->trangthai;
        $truyen->save();
        $truyen->thuocnhieudanhmuc()->attach($data['danhmuc_id']);
        return redirect()->route('truyen.index')->with('success', 'Thêm thành công');
        




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
        $danhmuc = Danhmuc::all();
        $truyen = Truyen::find($id);
        return view('admincp.truyen.edit', compact('truyen', 'danhmuc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'tentruyen' => 'required|unique:truyen,tentruyen,'.$id,
            'tomtat' => 'required',
            
            
            'tacgia' => 'required',
            'trangthai' => 'required'
            
        ],[
            'tentruyen.required' => 'Không được để trống',
            'tentruyen.unique' => 'Truyện đã tồn tại',
            'tomtat.required' => 'Không được để trống',
            
            
            'tacgia.required' => 'Không được để trống',
        ]);
        
        $truyen = Truyen::find($id);
        $truyen->tentruyen = $request->tentruyen;
        $truyen->slug_truyen = Str::slug($request->tentruyen);
        $truyen->tomtat = $request->tomtat;
        $mang = $request->danhmuc_id;
        
            
        
        
       
        $truyen->kichhoat = $request->kichhoat;
        $truyen->truyen_noibat = $request->truyen_noibat;
        
        $truyen->tacgia = $request->tacgia;
        $truyen->luotxem = 0;
        $truyen->trangthai = $request->trangthai;
        if ($request->image) {
            
            
            $get_name_image = $request->image->getClientOriginalName();
            $extension =$request->image->getClientOriginalExtension();
            if (strcasecmp($extension, 'jpg')=== 0
                ||strcasecmp($extension, 'png')=== 0
                ||strcasecmp($extension, 'jepg')=== 0) {
                  $nimage =Str::random(5). "_" . $get_name_image;
                while (file_exists("image/post/". $nimage))
                  $nimage = Str::random(5) . "_" . $get_name_image;
                  $request->image->move('image/posts', $nimage);
                  
                    $image_path = 'image/posts/'.$truyen->image;
                    if (File::exists($image_path)) {
                    File::delete($image_path);
                    //unlink($image_path);
                }
                  $truyen->image = $nimage;
                }
                
           }
        $truyen->save();
        
        return redirect()->route('truyen.index')->with('success', 'Thêm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $truyen = Truyen::find($id);
        $thuocdanh = Thuocdanhmuc::where('truyen_id',$id)->get();
        $image_path = 'image/posts/'.$truyen->image;
        if (File::exists($image_path)) {
        File::delete($image_path);
        //unlink($image_path);
        }
        $truyen->delete();
        
      
        return redirect()->route('truyen.index')->with('success', 'Xóa thành công');

    }
    public function truyennoibat(Request $request)
    {
        $data = $request->all();
       
        $truyen = Truyen::find($data['truyen_id']);
        $truyen->truyen_noibat = $data['truyennoibat'];
        
        $truyen->save();
    }
}
