<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #14425d ;">
    <div class="container">
        <a class="navbar-brand" href="/">TRANG CHỦ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Thể loại
                    </a>
                    <ul style="columns: 3;
                    -webkit-columns: 3;
                    -moz-columns: 3;" class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($theloai as $item)
                        <li><a class="dropdown-item" href="{{route('page.theloai', $item->slug_danhmuc)}}">{{$item->tendanhmuc}}</a></li>
                        @endforeach
                        
                        
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Phan Loai Theo Chuong
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{url('top-truyen/duoi-100-chuong')}}">Dưới 100 chương</a></li>
                        <li><a class="dropdown-item" href="{{url('top-truyen/100-500-chuong')}}">100 đến 500 chương</a></li>
                        <li><a class="dropdown-item" href="{{url('top-truyen/tren-500-chuong')}}">Trên 500 chương</a></li>
                    </ul>
                </li>
            </ul>
            <form  action="{{route('page.search')}}" class="d-flex" role="search" method="GET">
               @csrf
                <input name="tukhoa" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>