@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Danh sách truyện</div>
                

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên truyện</th>
                            
                            <th scope="col">Ảnh</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Kích hoạt</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Nổi bật</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($truyen as $key => $item)
                          <tr>
                            
                            <th scope="col">{{$key+1}}</th>
                            <th scope="col">{{$item->tentruyen}}</th>
                            <th scope="col"><img style="height: 60px" src="{{asset('image/posts/'.$item->image)}}" alt=""></th>
                            <th scope="col">@if ($item->trangthai == 0)
                              Đang ra
                              @else Full
                              
                          @endif</th>
                            <th scope="col">@if ($item->kichhoat == 0)
                                Kich hoạt
                                @else Không kích hoạt
                                
                            @endif</th>
                            <th scope="col">@foreach ($item->thuocnhieudanhmuc as $it)
                                 <p class="">{{$it->tendanhmuc}}</p>
                            @endforeach</th>
                            <th scope="col">
                              @if ($item->truyen_noibat==0)
                              <form>
                                @csrf
                              <select data-truyen_id="{{$item->id}}" style="width :90%" name="truyennoibat" class="truyennoibat form-select" aria-label="Default select example">Kích hoạt
                              
                                <option value="0"  selected >Truyện thường</option>
                                <option value="1">Truyện hot</option>
                                <option value="2">Truyện xem nhiều</option>
                              
                               </select>
                              </form>
                              @elseif ($item->truyen_noibat==1)
                              <form>
                                @csrf
                              <select data-truyen_id="{{$item->id}}" style="width :90%" name="truyennoibat" class="truyennoibat form-select" aria-label="Default select example">Kích hoạt
                              
                                <option value="0" >Truyện thường</option>
                                <option value="1" selected>Truyện hot</option>
                                <option value="2">Truyện xem nhiều</option>
                              
                               </select>
                              </form>
                            @else 
                            <form>
                              @csrf
                              <select data-truyen_id="{{$item->id}}" style="width :90%" name="truyennoibat" class="truyennoibat form-select" aria-label="Default select example">Kích hoạt
                              
                                <option value="0" >Truyện thường</option>
                                <option value="1" >Truyện hot</option>
                                <option value="2" selected>Truyện xem nhiều</option>
                              
                            </select>
                          </form>
                            @endif
                            </th>
                            <th scope="col"><a class="btn btn-primary" href="{{route('truyen.edit',$item->id)}}" role="button">Sửa</a>
                            </th>
                            <th scope="col"><form action="{{route('truyen.destroy',$item->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-primary" type="submit">Xóa</button>

                            </form>
                            
                          </th>

                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <nav> {{ $truyen->links() }}
                        
                      </nav>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
