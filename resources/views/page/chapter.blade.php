@extends('../layout')
@section('content')
<div class=" navbar-breadcrumb">
<div class="container breadcrumb-container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('page.doctruyen',$truyen->truyen->slug_truyen)}}">{{$truyen->truyen->tentruyen}}</a></li>
          <li class="breadcrumb-item active" aria-current="page">Chương {{$truyen->chuong}}</li>
        </ol>
      </nav>
</div>
</div>
<div class="container">
    <div class="tieude" style="text-align: center; text-transform: uppercase; margin-top: 20px">
        <h3>{{$truyen->truyen->tentruyen}}</h3>
    </div>
    <div class="tenchap" style="text-align: center; ">
        <p>{{$truyen->tieude}}</p>
        <i style="font-size: 35px" class="bi bi-bank2"></i>
    </div>
    
    <div class="buttn justify-content-center" style="display: flex; ">
        <style type="text/css">
            .isDisplay {
                color: currentColor;
                pointer-events: none;
                opacity: 0.5;
                text-decoration: none;
            }
        </style>
        <a  href="{{url('xemchapter/'.$pchap)}}" class="btn btn-secondary {{$truyen->chuong == $min_chap->chuong ? 'isDisplay' : ''}}" >Trang trước</a>
        <select  class="selectpicker select-chap border rounded" data-show-subtext="true" data-live-search="true">
            
                                @foreach($allchap as $item)
                            <a href="/"><option value="{{url('xemchapter/'.$item->slug_chapter)}}">{{$item->tieude}}</option></a>
                                @endforeach
            
        
            
        </select>
        <a  href="{{url('xemchapter/'.$nchap)}}"  class="btn btn-secondary {{$truyen->chuong == $max_chap->chuong ? 'isDisplay' : ''}}">Trang sau</a>
    </div>

    <div class="noidung">
        <style>
            .noidung{
                margin-top: 50px;
            }
            @media screen and (max-width: 500px){
                .noidung{
                    margin-top: 20px;
                    font-size: 12;
                }
            }
        </style>
        {!!$truyen->noidung!!}
    </div>
    <div style="font-size: 50px; text-align: center; margin: 20px auto">
        <span><i class="bi bi-moon-stars-fill"></i></span>
        <span><i class="bi bi-moon-stars-fill"></i></span>
        <span><i class="bi bi-moon-stars-fill"></i></span>
        <span><i class="bi bi-moon-stars-fill"></i></span>
    </div>
    <div class="buttn justify-content-center" style="display: flex; ">
        <a href="{{url('xemchapter/'.$pchap)}}" type="button" class="btn btn-secondary {{$truyen->chuong == $min_chap->chuong ? 'isDisplay' : ''}}">Trang trước</a>
        <select class="selectpicker select-chap border rounded" data-show-subtext="true" data-live-search="true">
            <option value="">Chọn truyện</option>
                                @foreach($allchap as $item)
                            <a href="/"><option value="{{url('xemchapter/'.$item->slug_chapter)}}">{{$item->tieude}}</option></a>
                                @endforeach
            
        
            
        </select>
        <a href="{{url('xemchapter/'.$nchap)}}" type="button" class="btn btn-secondary {{$truyen->chuong == $max_chap->chuong ? 'isDisplay' : ''}}">Trang sau</a>
    </div>
</div>
<script>
    $('.select-chap').on('change', function(){
        let url = $(this).val();
        if(url){
            window.location = url;
        }
        return false;
    })
    chapp();
    function chapp(){
        let url = window.location.href;
        $('.select-chap').find('option[value="'+url+'"]').attr('selected', true);
    }
</script>


@endsection