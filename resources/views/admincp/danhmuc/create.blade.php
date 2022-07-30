@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Thêm danh mục</div>

                <div class="card-body">
                   

                    <form action="{{route('danhmuc.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label  class="form-label">Tên danh mục</label>
                          <input type="text" name="tendanhmuc" class="form-control"  aria-describedby="emailHelp">
                          @error('tendanhmuc')
                          <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                          <label  class="form-label">Mô tả</label>
                          <input type="text" name="mota" class="form-control" id="exampleInputPassword1">
                          @error('mota')
                          <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <label  class="form-label">Kích hoạt</label>
                        <select name="kichhoat" class="form-select" aria-label="Default select example">Kích hoạt
                            
                            <option value="0" selected>Kích hoạt</option>
                            <option value="1">Không kích hoạt</option>
                            
                        </select><br/>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
