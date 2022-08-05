@extends('../layout')
@section('content')
<div class=" navbar-breadcrumb">
    <div class="container breadcrumb-container">
        Đọc truyện online, đọc truyện chữ, truyện full, truyện hay. Tổng hợp đầy đủ và cập nhật liên tục.
    </div>
</div>
<div class="hot-list">
    <div class="container">
        <div class="hot-list-tittle">
            <h2>
                <a style="pointer-events: none;" href="https://truyenfull.vn/danh-sach/truyen-hot/">Truyện hot</a>
                <i class="bi bi-pencil-fill"></i>
            </h2>
        </div>
        <div class="hot-list-card" style="display: block;">
            <div class="row">
                @foreach ($truyenhot as $item)
                <div class="col-md-2 col-lg-2 col-sm-3 col-4">
                    <div class="item top-1 card-product" itemscope="" itemtype="https://schema.org/Book">
                        <a href="{{route('page.doctruyen',$item->slug_truyen)}}" itemprop="url"><img
                                src="{{asset('image/posts/'.$item->image)}}"
                                alt="" class="img-responsive item-img"
                                itemprop="image">
                            <div class="title">
                                <h3 itemprop="name">{{$item->tentruyen}}</h3>
                            </div>
                        </a>
                    </div>
                </div> 
                @endforeach              
            </div>
        </div>
    </div>
</div>
<div class="new-item">
    <div class="container">

        <div class="row row-item">
            <div class="row-new col-md-9 col-sm-12">
                <div class="new-tittle">
                    <h2>
                        <a href="">Truyện mới cập nhật</a>
                        <i class="bi bi-pencil-fill"></i>
                        <form>
                            @csrf
                            <select class="btn btn-secondary dropdown-toggle select-theloai"  id="dropdownMenuButton2"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <option>Tất cả</option>
                            @foreach ($theloai as $item)
                            <option value="{{Request::url()}}?id={{$item->id}}">{{$item->tendanhmuc}}</option>
                            @endforeach                         
                            </select>
                        </form>
                    </h2>
                </div>
                @foreach ($truyenmoi as $item)
                <div class="thongtin-item row">
                   
                    <div class="ab1 breadcrumb-container col-md-5 col-sm-6  col-9 col-xs-9">
                        <h3><a href="{{route('page.doctruyen', $item->truyen->slug_truyen)}}"
                                title="Thanh Mai Kề Bên Trúc Mã" itemprop="url">{{$item->truyen->tentruyen}}</a></h3>
                    </div>
                    <div class="ab2 breadcrumb-container col-md-3 col-sm-3 d-none d-sm-block d-md-block d-lg-block">
                        <h3>
                            @foreach ($item->truyen->thuocnhieudanhmuc as $it)
                            <a id="f2" itemprop="genre" href="{{route('page.theloai',$it->slug_danhmuc)}}" title="Ngôn Tình">{{$it->tendanhmuc}}, </a>
                            @endforeach
                            {{-- @foreach()
                                
                            
                                
                            @endforeach --}}
                            
                        </h3>
                    </div>
                    <div class="ab3 breadcrumb-container col-md-2 col-sm-3 col-3 col-xs-3">
                        <h3><a href="" title=""><span class="chapter-text">{{$item->tieude}}</span></a></h3>
                    </div>
                    <div class="ab4 breadcrumb-container col-md-2 d-none d-md-block d-lg-block">
                        <h3>{{$item->created_at->diffForHumans()}}</h3>
                    </div>
                    
                </div>
                @endforeach
            </div>
            <div class=" col-md-3 d-none d-md-block d-lg-block">
                
                @include('page.menu')
            </div>
        </div>

    </div>
</div>
<div class=" container dahoanthanh">
    <div class="done-tittle">
        <h2>
            <a href="https://truyenfull.vn/danh-sach/truyen-full/">Truyện đã hoàn thành</a>
            <i class="bi bi-arrow-right-circle"></i>
        </h2>
    </div>
    <div class="row done-list">
        @foreach ($truyenfull as $item)
        <div class="col-md-2 col-lg-2 col-sm-3 col-4 ">
            <div class="done-item top-10 card-product" itemscope="" itemtype="https://schema.org/Book">
                <a href="{{route('page.doctruyen',$item->slug_truyen)}}" itemprop="url">
                    <img src="{{asset('image/posts/'.$item->image)}}"
                        alt="" class="img-responsive item-img" itemprop="image">
                    <div class="title">
                        <h3 itemprop="name">{{$item->tentruyen}}</h3>
                    </div>
                    <div class="sochuongfull">
                        <small>Full - {{count($item->chapter)}} chương</small>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
</div>


<div class=" container dahoanthanh">   
    <form>
        <select id='mySelect'>
            <option value='0'>All</option>
            @foreach ($theloai as $key => $item)
            <option value='{{$key+1}}'>{{$item->tendanhmuc}}</option>
            @endforeach
        </select>
    </form> 
    <ul hidden class="nav nav-tabs" id="my-tab">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="pill" href="#home">Home</a>
        </li>
       
            
        @foreach ($theloai as $item)
        <li class="nav-item">
            <a data-danhmuc_id="{{$item->id}}" class="nav-link tab" data-toggle="pill" href="#{{$item->slug_danhmuc}}">{{$item->tendanhmuc}}</a>
        </li>
        @endforeach
     
    </ul>
    
    
    <div class="tab-content">
        <div class="tab-pane container active" id="home">
            <div class="row done-list">
                @foreach ($truyenhot5 as $item)
                <div class="col-md-2 col-lg-2 col-sm-3 col-4 ">
                    <div class="done-item top-10 card-product" itemscope="" itemtype="https://schema.org/Book">
                        <a href="{{route('page.doctruyen',$item->slug_truyen)}}" itemprop="url">
                            <img src="{{asset('image/posts/'.$item->image)}}"
                                alt="" class="img-responsive item-img" itemprop="image">
                            <div class="title">
                                <h3 itemprop="name">{{$item->tentruyen}}</h3>
                            </div>
                            <div class="sochuongfull">
                                <small>Full - {{count($item->chapter)}} chương</small>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @foreach ($theloai as $item)
        <div class="tab-pane container" id="{{$item->slug_danhmuc}}">
            <div class="row done-list" id="tab_danhmuc_{{$item->id}}">
                {{-- output    --}}
            </div>
        </div>
        @endforeach
    </div>




    
    <script>
        $(document).ready(function(){
            $('#mySelect').change(function (e) {
                
        $('#my-tab li a').eq($(this).val()).tab('show').click();
    
        });
        })
        
    </script>
    
    <script>
        $(document).ready(function() {
            $('.tab').click(function(){
                const danhmuc_id = $(this).data('danhmuc_id');
                
                let _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{url('/tab-danhmuc')}}',
                    method: "POST",
                    data: {danhmuc_id:danhmuc_id, _token:_token},
                    success:function(data){
                        $('#tab_danhmuc_'+danhmuc_id).html(data);
                    }
                })
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('.select-theloai').change(function(){
                const danhmuc_id = $(this).val();
               
                let _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{url('/tab-danhmuc')}}',
                    method: "POST",
                    data: {danhmuc_id:danhmuc_id, _token:_token},
                    success:function(data){
                        
                    }
                })
            })
        })
    </script>



    
    


@endsection