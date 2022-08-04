@extends('layouts.admin')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">Thêm chapter</div>
            <div class="card-body">
               <form action="{{route('chapter.store')}}" method="POST">
                  @csrf
                  <div class="mb-3">
                     <label class="form-label">Truyện</label>
                     <select name="truyen_id" class="selectpicker w-100 border rounded" data-show-subtext="true" data-live-search="true">
                        <option value="">Chọn truyện</option>
                        @foreach($truyen as $item)
                        <option value="{{$item->id}}">{{$item->tentruyen}}</option>
                        @endforeach
                     </select>
                     @error('truyen_id')
                     <span style="color: red">{{ $message }}</span>
                     @enderror
                  </div>
                  <div  class="mb-3">                          
                     <label  class="form-label">Tiêu đề</label>
                     <input type="text" name="tieude" class="form-control"  aria-describedby="emailHelp">
                     @error('tieude')
                     <span style="color: red">{{ $message }}</span>
                     @enderror
                  </div>
                  <div  class="mb-3">                      
                     <label  class="form-label">Chương</label>
                     <input type="text" name="chuong" class="form-control"  aria-describedby="emailHelp">
                     @error('chuong')
                     <span style="color: red">{{ $message }}</span>
                     @enderror
                  </div>
                  <div class="mb-3">
                     <label for="exampleFormControlTextarea1" class="form-label">Tóm tắt</label>
                     <textarea name="tomtat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                     @error('tomtat')
                     <span style="color: red">{{ $message }}</span>
                     @enderror
                  </div>
                  <div class="mb-3">
                     <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
                     <textarea id="noidung" name="noidung" class="ckeditor"></textarea>
                     @error('noidung')
                     <span style="color: red">{{ $message }}</span>
                     @enderror
                  </div>
                  <label  class="form-label">Kích hoạt</label>
                  <select name="kichhoat" class="form-select" aria-label="Default select example">
                     Kích hoạt
                     <option value="0" selected>Kích hoạt</option>
                     <option value="1">Không kích hoạt</option>
                  </select>
                  <br/>                    
                  <button type="submit" class="btn btn-primary">Submit</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection