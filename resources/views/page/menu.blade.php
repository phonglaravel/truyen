<div class="theloai">
    <div class="theloai-title">
        <h2>The loai truyen</h2>
    </div>
    <div class="row theloai-danhsach">
        <div class="row">
                @foreach ($theloai as $item)
                <div class="col-lg-6"><a href="{{route('page.theloai', $item->slug_danhmuc)}}"
                        title="">{{$item->tendanhmuc}}</a>
                </div>
                @endforeach
            
            
        </div>
    </div>
</div>