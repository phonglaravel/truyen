@extends('../layout')
@section('content')
<div class=" navbar-breadcrumb">
    <div class="container breadcrumb-container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$truyen->tentruyen}}</li>
            </ol>
          </nav>
    </div>
</div>

<div>
    <div class="container">    
        <div class="row" style="overflow: hidden;width: 100%;">
            <div class="col-md-9 col-sm-12">
                <div class="hot-list-tittle">
                    <h2>
                        <a style="pointer-events: none" href="#">Thông tin truyện</a>
                    </h2>
                </div>      
                <div class="row" style="margin-top: 15px">
                    <div class="col-md-4 col-sm-12" >
                        <div class="hinhanh" style="text-align: center">
                            <img class="img-src" style="width :200px;" src="{{asset('image/posts/'.$truyen->image)}}" alt="">
                        </div>
                        <div class="tacgia" style="margin-left: 30px; margin-top: 20px">
                            <span style="font-weight: 600">Tác giả: </span><span>{{$truyen->tacgia}}</span>
                        </div>
                        <div class="tacgia" style="margin-left: 30px">
                            
                            <span style="font-weight: 600">Thể loại: </span><span>{{$truyen->thuocnhieudanhmuc->implode('tendanhmuc', ',')}}</span>
                        </div>
                        <div class="tacgia" style="margin-left: 30px">
                            <span style="font-weight: 600">Trạng thái : </span><span>@if ($truyen->trangthai==0)
                                Đang cập nhật
                                @else
                                Full
                            @endif</span>
                        </div>

                    </div>
                    <div class="col-md-8 col-sm-12">
                        <div class="tentruyen" style="text-align: center; border-bottom: 1px solid red">
                            <h3 style="text-transform: uppercase">{{$truyen->tentruyen}}</h3>
                        </div>
                        <div class="tomtat" >
                            {!!$truyen->tomtat!!}                     
                        </div>
                        <div style="text-align: right">
                            <button type="button" class="btn btn-link xemthem">Xem thêm</button>
                        </div>
                        <div>
                            <h2 style="text-transform: uppercase; font-size :17px; border-bottom: 1px solid #4E4E4E4E;
                            ">
                                Chap mới nhất
                            </h2>
                            @foreach ($chapter_moi as $item)
                            <li style="list-style: none">
                                <span><i class="bi bi-brightness-low-fill"></i></span>
                                <a style="color: black; text-decoration:none" href="{{route('page.docchapter',$item->slug_chapter)}}">
                                    <span>Chương </span><span>{{$item->chuong}}</span>
                                </a>
                            </li>
                            @endforeach
                            
                        </div>
                        <div style="margin-top: 20px">
                            @if ($chapdau)
                            <span><a class="btn btn-primary" href="{{route('page.docchapter',$chapdau->slug_chapter)}}" role="button">Đọc từ đầu</a></span>
                            
                            @endif
                            @if ($chapcuoi)
                            <span><a class="btn btn-primary" href="{{route('page.docchapter',$chapcuoi->slug_chapter)}}" role="button">Đọc mới nhất</a></span>
                            
                            @endif
                            <span id="thich"></span>
                            
                        </div>
                           
                        
                    </div>
                </div>
                @php
                    $tukhoa = explode(",",$truyen->tukhoa);
                @endphp
                <div class="tagcloud05">
                    
                    <p style="margin-left: 20px">Từ khóa</p>
                    <ul>
                        @foreach ($tukhoa as $item)
                        <li><a href="{{url('tag/'.\Str::slug($item))}}"><span>{{$item}}</span></a></li>
                        @endforeach
                        
                        
                    </ul>
                </div>
                <div class="hot-list-tittle" style="margin-top: 20px">
                    <h2>
                        <a style="pointer-events: none" href="#">Mục lục</a>
                    </h2>
                </div>      
                <div class="row rowul" style="margin-top: 15px; float: left">
                    <style>
                        .rowul ul{
                        columns: 2;
                        -webkit-columns: 2;
                        -moz-columns: 2;}
                        @media screen and (max-width: 500px){
                            .rowul ul{
                                columns: 1;
                                -webkit-columns: 1;
                                -moz-columns: 1;
                            }
                        }
                    </style>
                    <ul style="">
                        @foreach ($chapter as $item)
                            <li style="list-style: none;">
                                <span><i class="bi bi-brightness-low-fill"></i></span>
                                <a style="color: black; text-decoration:none" href="{{route('page.docchapter',$item->slug_chapter)}}">
                                    <span>{{$item->tieude}}</span>
                                </a>
                            </li>
                            @endforeach
                    </ul>
                    <nav> {{ $chapter->links() }}

                    
                </div>
            </div>
            

            <div class=" col-md-3 d-none d-md-block d-lg-block">
                <div class="dangdoc" id="yeuthich">
                    <div class="dangdoc-tittle">
                        <h2>Truyện yêu thích</h2>
                        
                    </div>
                    
                        
                    
                  
                </div>
                <button id="clearlike">Xóa yêu thích</button>
                @include('page.menu')
            </div>
        </div>

    </div>
</div>
<div class=" container dahoanthanh">
    <div class="done-tittle">
        <h2>
            <a href="https://truyenfull.vn/danh-sach/truyen-full/">Truyen Da hoan thanh</a>
            <i class="bi bi-arrow-right-circle"></i>
        </h2>
    </div>
    </div>
</div>
<input type="hidden" value="{{$truyen->tentruyen}}" class="nametruyen">
<input type="hidden" value="{{$truyen->id}}" class="idtruyen">
<input type="hidden" value="{{\URL::current()}}" class="urltruyen">
<script type="text/javascript">
$(document).ready(function(){

   height = $(".tomtat").height();
   if (height <= 210) {
    $(".xemthem").css({ 'display': 'none'});
    $(".tomtat").css({ "height": "240px","overflow": "hidden","text-overflow": "ellipsis"});
   }
   else {
    $(".tomtat").css({ "height": "210px ","overflow": "hidden","text-overflow": "ellipsis"});
    
   }
   $(".xemthem").click(function(){
     $(".tomtat").css({ "height": "","overflow": "","text-overflow": ""});
   });

});
</script>
<script type="text/javascript">  
   show();
   function show() {
    let idd = $(".idtruyen").val();
    if(localStorage.getItem('truyenyeuthich')!=null){
        var data = JSON.parse(localStorage.getItem('truyenyeuthich'));
        for (let i = 0; i < data.length; i++) {
            var title = data[i].title;
            var id = data[i].id;
            var url = data[i].url;
            $('#yeuthich').append(`<div class="dangdoc-item" >
                <div class="abc col-lg-12">
                    <h3>
                         <a href="`+url+`">`+title+`</a>
                    </h3>
                </div>
            </div>            
                `);
            
        }
    }else{
        localStorage.setItem('truyenyeuthich','[]');
    }
    var old_data = JSON.parse(localStorage.getItem('truyenyeuthich'));
           
            var matches = $.grep(old_data, function(obj){
                return obj.id == idd;
            })
            if (matches.length) {
                $('thich').empty()
                $('#thich').append(`<button type="button" class="btn btn-danger thich-truyen">Đã thích</button>`);
            }else{
                $('thich').empty()
                $('#thich').append(`<button type="button" class="btn btn-primary thich-truyen">Yêu thích</button>`);
            }
   }
        $('#clearlike').click(function(){
            localStorage.removeItem('truyenyeuthich')
            location.reload()
        })
        $(".thich-truyen").click(function(){
            const title = $(".nametruyen").val();
            const id = $(".idtruyen").val();
            const url = $(".urltruyen").val();
            const item = {
                'title' : title,
                'id' : id,
                'url' : url

            }
            if(localStorage.getItem('truyenyeuthich')==null){
                localStorage.setItem('truyenyeuthich','[]');
            }
            var old_data = JSON.parse(localStorage.getItem('truyenyeuthich'));
            var matches = $.grep(old_data, function(obj){
                return obj.id == id;
            })
            if (matches.length) {
                alert ('Truyện đã có trong mục yêu thích')
            }else {
                if(old_data.length<=5) {
                    old_data.push(item);
                }else{
                    alert ('Đã đạt giới hạn lưu vào yêu thích');
                }
                $('#thich').empty()
                $('#thich').append('<button type="button" class="btn btn-danger thich-truyen">Đã thích</button>');
                $('#yeuthich').append(`<div class="dangdoc-item" >
                <div class="abc col-lg-12">
                    <h3>
                         <a href="`+url+`">`+title+`</a>
                    </h3>
                </div>
            </div>            
                `);
                localStorage.setItem('truyenyeuthich', JSON.stringify(old_data));
            }
            localStorage.setItem('truyenyeuthich', JSON.stringify(old_data));
        });
    
    
</script>
{{-- style="display: inline-block; height: 250px;overflow: hidden;text-overflow: ellipsis" --}}

@endsection