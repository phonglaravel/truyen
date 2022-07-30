@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Sửa chapter</div>

                <div class="card-body">
                   

                    <form action="{{route('chapter.update', $chapter->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label class="form-label">Truyện</label>
                            <select name="truyen_id" class="selectpicker w-100 border rounded" data-show-subtext="true" data-live-search="true">
                                <option selected>Chọn truyện</option>
                                @foreach($truyen as $item)
                            <option value="{{$item->id}}" @if ($chapter->truyen_id == $item->id)
                                selected
                            @endif>{{$item->tentruyen}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div  class="mb-3">
                            
                          <label  class="form-label">Tiêu đề</label>
                          <input type="text" name="tieude" value="{{$chapter->tieude}}" class="form-control"  aria-describedby="emailHelp">
                          @error('tieude')
                          <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Tóm tắt</label>
                            <textarea name="tomtat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$chapter->tomtat}}</textarea>
                          @error('tomtat')
                          <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
                            <textarea id="noidung" name="noidung" class="ckeditor">{{$chapter->noidung}}</textarea>
                          @error('noidung')
                          <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        
                        <label  class="form-label">Kích hoạt</label>
                        <select name="kichhoat" class="form-select" aria-label="Default select example">Kích hoạt
                            @if ($chapter->kichhoat==0)
                                <option value="0" selected>Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                            @else
                                <option value="0" >Kích hoạt</option>
                                <option value="1" selected>Không kích hoạt</option>
                            @endif
                            
                            
                        </select><br/>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
