@extends('../layout')
@section('content')
<div class=" navbar-breadcrumb">
    <div class="container breadcrumb-container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              
              <li class="breadcrumb-item active" aria-current="page">{{$tukhoa}}</li>
            </ol>
          </nav>
    </div>
    </div>

<div>
    <div class="container"> 
        <div class="row" style="overflow: hidden; width: 100%;">
            <div class="col-md-9 col-sm-12">
                <div class="hot-list-tittle">
                    <h2>
                        <a style="pointer-events: none" href="#">{{$tukhoa}}</a>
                    </h2>
                </div>
                @if(count($truyen)==0)
                <h4>Không tìm thấy...</h4>
                @else
                @foreach ($truyen as $item)
                <div class="row tenvatacgia overflow-hidden">
                    <div class="ohinhanh1 col-md-3 col-lg-3 col-sm-3 col-3 ">
                        
                            <img src="{{asset('image/posts/'.$item->image)}}"
                                class="cover" alt="">
                       
                    </div>
                    <div class="truyenhot col-md-7 col-lg-7 col-sm-6 col-6">
                        <div class="cangiua">
                            <div class="itemhot-name">

                                <i class="bi bi-book"></i>
                                <h3>
                                    <a href="{{route('page.doctruyen',$item->slug_truyen)}}">
                                        {{$item->tentruyen}}
                                    </a>
                                </h3>
                                <small>
                                    HOT
                                </small>
                            </div>
                            <div class="tacgia">
                                <i class="bi bi-brush"></i>
                                <p>{{$item->tacgia}}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="chuong col-md-2 col-lg-2 col-sm-3 col-3">
                        
                        <div class="chuongcangiua">Chương {{$item->chapter->count()}}</div>
                    </div>
                </div>
               @endforeach
               @endif
                           
            </div>
            <div class=" col-md-3 d-none d-md-block d-lg-block">         
                @include('page.menu')
                
            </div>
        </div>
    </div>
</div>
@endsection