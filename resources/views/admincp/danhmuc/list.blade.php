@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Danh sách danh mục</div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Kích hoạt</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($danhmuc as $key => $item)
                          <tr>
                            
                            <th scope="col">{{$key+1}}</th>
                            <th scope="col">{{$item->tendanhmuc}}</th>
                            <th scope="col">{{$item->slug_danhmuc}}</th>
                            <th scope="col">{{$item->mota}}</th>
                            <th scope="col">@if ($item->kichhoat == 0)
                                Kich hoạt
                                @else Không kích hoạt
                                
                            @endif</th>
                            <th scope="col"><a class="btn btn-primary" href="{{route('danhmuc.edit',$item->id)}}" role="button">Sửa</a>
                            </th>
                            <th scope="col"><form action="{{route('danhmuc.destroy',$item->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-primary" type="submit">Xóa</button>
                            </form></th>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <nav> {{ $danhmuc->links() }}                        
                      </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
