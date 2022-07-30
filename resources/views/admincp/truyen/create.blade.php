@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Thêm truyện</div>

                <div class="card-body">
                   

                    <form action="{{route('truyen.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            
                          <label  class="form-label">Tên truyện</label>
                          <input type="text" name="tentruyen" class="form-control"  aria-describedby="emailHelp">
                          @error('tentruyen')
                          <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Tác giả</label>
                            <input type="text" name="tacgia" class="form-control"  aria-describedby="emailHelp">
                            @error('tacgia')
                            <span style="color: red">{{ $message }}</span>
                              @enderror
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Tag</label>
                            <input type="text" name="tukhoa" class="form-control"  aria-describedby="emailHelp">
                            @error('tukhoa')
                            <span style="color: red">{{ $message }}</span>
                              @enderror
                        </div>
                          <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Tóm tắt</label>
                            <textarea id="tomtat" name="tomtat" class="ckeditor"></textarea>
                          @error('tomtat')
                          <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Danh mục truyện</label>
                            <select name="danhmuc_id[]"  class="multi_select w-100" multiple data-live-search="true">
                                @foreach($danhmuc as $item)
                            <option id="danhmuc_{{$item->id}}" value="{{$item->id}}">{{$item->tendanhmuc}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Images</label>
                            <input type="file" name="image" accept="image/*">
                            @error('image')
                            <span style="color: red">{{$message}}</span>
                            
                            @enderror<br/>
                        <label style="margin-top: 20px" class="form-label">Truyện hot</label>
                        <select name="truyen_noibat" class="form-select" aria-label="Default select example">Kích hoạt
                                
                                <option value="0" selected>Truyện thường</option>
                                <option value="1">Truyện hot</option>
                                <option value="2">Truyện xem nhiều</option>
                                
                            </select><br/>
                        </div>
                        <label  class="form-label">Kích hoạt</label>
                        <select name="kichhoat" class="form-select" aria-label="Default select example">Kích hoạt
                            
                            <option value="0" selected>Kích hoạt</option>
                            <option value="1">Không kích hoạt</option>
                            
                        </select><br/>
                        <label  class="form-label">Trạng thái</label>
                        <select name="trangthai" class="form-select" aria-label="Default select example">Kích hoạt
                            
                            <option value="0" selected>Đang ra</option>
                            <option value="1">Full</option>
                            
                        </select><br/>
                       
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
