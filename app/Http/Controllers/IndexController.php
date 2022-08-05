<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Danhmuc;
use App\Models\Thuocdanhmuc;
use App\Models\Truyen;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home(Request $request)
    {
        Carbon::setLocale('vi');     
        $truyenhot = Truyen::with('danhmuctruyen')->where('truyen_noibat', 1)->take(12)->get();
        $truyenhot5 = Truyen::with('danhmuctruyen')->where('truyen_noibat', 1)->take(5)->get();  
        $theloai = Danhmuc::orderBy('id', 'ASC')->get();
        $truyenmoi = Chapter::with('truyen')->orderBy('created_at', 'DESC')->take(25)->get();
        $truyenfull = Truyen::with('chapter')->where('trangthai', 1)->take(12)->get();  
        return view('page.index', compact('truyenhot','theloai', 'truyenmoi', 'truyenfull','truyenhot5'));
    }
    public function doctruyen($slug)
    {
        $theloai = Danhmuc::orderBy('id', 'ASC')->get();        
        $truyen = Truyen::with('danhmuctruyen','thuocnhieudanhmuc')->where('slug_truyen', $slug)->where('kichhoat', 0)->first();
        $chapter = Chapter::orderBy('id', 'ASC')->where('truyen_id',$truyen->id)->paginate(50);
        // $chapter_dau = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id',$truyen->id)->first();
        $chapter_moi = Chapter::orderBy('id', 'DESC')->where('truyen_id',$truyen->id)->take(5)->get();
        $chapdau = Chapter::orderBy('id','ASC')->where('truyen_id',$truyen->id)->first();
        $chapcuoi = Chapter::orderBy('id','DESC')->where('truyen_id',$truyen->id)->first();
        // $cungdanhmuc = Truyen::with('danhmuctruyen')->where('danhmuc_id', $truyen->danhmuctruyen->id)->whereNotIn('id',[$truyen->id]);
        return view('page.truyen', compact('truyen','theloai','chapter_moi','chapter','chapdau','chapcuoi'));
    }
    public function docchapter($slug)
    {        
        $truyen = Chapter::with('truyen')->where('slug_chapter',$slug)->first();
        $theloai = Danhmuc::orderBy('id', 'ASC')->get();       
        $allchap = Chapter::with('truyen')->orderBy('id', 'ASC')->where('truyen_id', $truyen->truyen_id)->get();
        $nchap = Chapter::where('truyen_id', $truyen->truyen_id)->where('id', '>', $truyen->id)->min('slug_chapter');
        $pchap = Chapter::where('truyen_id', $truyen->truyen_id)->where('id', '<', $truyen->id)->max('slug_chapter');
        $max_chap = Chapter::where('truyen_id', $truyen->truyen_id)->orderBy('chuong', 'DESC')->first();      
        $min_chap = Chapter::where('truyen_id', $truyen->truyen_id)->orderBy('chuong', 'ASC')->first();
        return view('page.chapter', compact('theloai','allchap','truyen', 'nchap','pchap','max_chap', 'min_chap'));
    }
    public function theloai($slug)
    {
        $theloai = Danhmuc::orderBy('id', 'ASC')->get();
        $theloaimain = Danhmuc::where('slug_danhmuc',$slug)->first();
        $truyentheloai = Thuocdanhmuc::where('danhmuc_id',$theloaimain->id)->get();
        $nhieutheloai = [];
        foreach ($truyentheloai as $item){
            $nhieutheloai[] = $item->truyen_id;
        }
       $truyen = Truyen::with('chapter')->whereIn('id',$nhieutheloai)->orderBy('created_at', 'DESC')->get();        
        return view('page.theloai', compact('theloai','theloaimain','truyen'));
    }
    public function search()
    {
        $theloai = Danhmuc::orderBy('id', 'ASC')->get();
        $tukhoa = $_GET['tukhoa'];
        $truyen = Truyen::with('danhmuctruyen')->where('tentruyen','LIKE', '%'.$tukhoa.'%')
        ->orWhere('tomtat','LIKE', '%'.$tukhoa.'%')
        ->orWhere('tacgia','LIKE', '%'.$tukhoa.'%')->get();
        return view('page.search',compact('theloai','tukhoa','truyen'));
    }
    public function tag($tag)
    {
        $theloai = Danhmuc::orderBy('id', 'ASC')->get();
        $tags = explode("-",$tag);
        $truyen = Truyen::with('thuocnhieudanhmuc')->where(
            function ($query) use($tags){
                for ($i = 0; $i <count($tags); $i++){
                    $query->orWhere('tukhoa','LIKE','%'.$tags[$i].'%');
                }
            }
        )->paginate(12);
        return view('page.tag',compact('theloai','tags','truyen'));
    }
    public function duoi100()
    {
        $theloai = Danhmuc::orderBy('id', 'ASC')->get();
        $alltruyen = Truyen::with('chapter')->orderBy('id', 'DESC')->get();
        $truyen = array();
        foreach($alltruyen as $key => $tr){
            if(count($tr->chapter)<100){
                array_push($truyen,$tr );
            }
        }
        return view('page.toptruyen', compact('truyen','theloai'));
    }
    public function duoi500()
    {
        $theloai = Danhmuc::orderBy('id', 'ASC')->get();
        $alltruyen = Truyen::with('chapter')->orderBy('id', 'DESC')->get();
        $truyen = array();
        foreach($alltruyen as $key => $tr){
            if(count($tr->chapter)>=100 && count($tr->chapter)<=500){
                array_push($truyen,$tr );
            }
        }
        return view('page.toptruyen', compact('truyen','theloai'));
    }
    public function tren500()
    {
        $theloai = Danhmuc::orderBy('id', 'ASC')->get();
        $alltruyen = Truyen::with('chapter')->orderBy('id', 'DESC')->get();
        $truyen = array();
        foreach($alltruyen as $key => $tr){
            if(count($tr->chapter)>500){
                array_push($truyen,$tr );
            }
        }
        return view('page.toptruyen', compact('truyen','theloai'));
    }
    public function tabdanhmuc(Request $request)
    {
        $data = $request->all();    
        $theloaimain = Danhmuc::where('id',$data['danhmuc_id'])->first();
        $truyentheloai = Thuocdanhmuc::where('danhmuc_id',$theloaimain->id)->get();
        $nhieutheloai = [];
        foreach ($truyentheloai as $item){
            $nhieutheloai[] = $item->truyen_id;
        }
       $truyendanhmuc = Truyen::with('chapter')->whereIn('id',$nhieutheloai)->orderBy('created_at', 'DESC')->get();
        $output = '';
       foreach($truyendanhmuc as $item){
        $output.='<div class="col-md-2 col-lg-2 col-sm-3 col-4 ">
        <div class="done-item top-10 card-product" itemscope="" itemtype="https://schema.org/Book">
            <a href="'.url('xemtruyen/'.$item->slug_truyen).'" itemprop="url">
                <img src="'.asset('image/posts/'.$item->image).'"
                    alt="" class="img-responsive item-img" itemprop="image">
                <div class="title">
                    <h3 itemprop="name">'.$item->tentruyen.'</h3>
                </div>
                <div class="sochuongfull">
                    <small>'.count($item->chapter).' chương</small>
                </div>
            </a>
        </div>
    </div>';
        }  
        $output1 = '<h2>Truyện đang cập nhật</h2>';
        if($truyendanhmuc->count()==0){
            echo $output1;
        }     
        else {
            echo $output;
        }       
    }
    public function chontheloai(Request $request)
    {
        $data = $request->all();
    }  
}
