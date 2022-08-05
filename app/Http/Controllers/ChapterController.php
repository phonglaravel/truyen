<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Truyen;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapter = Chapter::orderBy('created_at', 'DESC')->paginate(10);
        return view('admincp.chapter.list', compact('chapter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $truyen = Truyen::orderBy('id','DESC')->get();
        return view('admincp.chapter.create', compact('truyen'));
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
            'truyen_id' => 'required',
            'tieude' => 'required|unique:chapter',
            'chuong' => 'required',
            
            
            'noidung' => 'required',
            'truyen_id' => 'required'
        ],[
            'tieude.unique' => 'Trung slug',
            'truyen_id.required' => 'Không được để trống',
            'tieude.required' => 'Không được để trống',
            'chuong.required' => 'Không được để trống',
            'noidung.required' => 'Không được để trống',
            'truyen_id.required' => 'Không được để trống'
        ]);
        $chapter = new Chapter();
        $chapter->truyen_id = $request->truyen_id;
        $chapter->tieude = $request->tieude;
        $chapter->slug_chapter = Str::slug($request->tieude);
        $chapter->chuong = $request->chuong;
        $chapter->tomtat = $request->tomtat;
        $chapter->created_at = Carbon::now();
        $chapter->noidung = $request->noidung;
        $chapter->kichhoat = $request->kichhoat;
        $chapter->save();
        return redirect()->route('chapter.index')->with('success', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
       
    }
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
        $truyen = Truyen::all();
        $chapter = Chapter::find($id);
        return view('admincp.chapter.edit', compact('truyen', 'chapter'));
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
            
            'truyen_id' => 'required',
            

            'tieude' => 'required',
            'noidung' => 'required',
            
            
        ],[
            
            'tieude.required' => 'Không được để trống',
            'truyen_id.required' => 'Không được để trống',
            'noidung.required' => 'Không được để trống',
            
            

        ]);
        $chapter = Chapter::find($id);
        $chapter->truyen_id = $request->truyen_id;
        $chapter->tieude = $request->tieude;
        $chapter->slug_chapter = Str::slug($request->tieude);       
        $chapter->tomtat = $request->tomtat;
        $chapter->noidung = $request->noidung;
        $chapter->kichhoat = $request->kichhoat;
        $chapter->save();
        return redirect()->route('chapter.index')->with('success', 'Sửa thành công');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chapter::find($id)->delete();
        return redirect()->route('chapter.index')->with('success', 'Xóa thành công');
    }
}
