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
                  {{ session('') }}
               </div>
               @endif
               <a class="btn btn-success" href="{{route('chapter.create')}}">Add</a>
               <table class="table">
                  <thead>
                     <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên chapter</th>
                        <th scope="col">Truyện</th>
                        <th scope="col">Kích hoạt</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($chapter as $key => $item)
                     <tr>
                        <th scope="col">{{$key+1}}</th>
                        <th scope="col">{{$item->tieude}}</th>
                        <th scope="col">{{$item->truyen->tentruyen}}</th>
                        <th scope="col">@if ($item->kichhoat == 0)
                           Kich hoạt
                           @else Không kích hoạt
                           @endif
                        </th>
                        <th scope="col"><a class="btn btn-primary" href="{{route('chapter.edit',$item->id)}}" role="button">Sửa</a>
                        </th>
                        <th scope="col">
                           <form action="{{route('chapter.destroy',$item->id)}}" method="POST">
                              @csrf
                              @method('delete')
                              <button class="btn btn-primary" type="submit">Xóa</button>
                           </form>
                        </th>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
               <nav> {{ $chapter->links() }}
               </nav>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection