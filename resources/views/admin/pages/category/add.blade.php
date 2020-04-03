@extends('admin.layouts.master')
@section('title')
    Danh mục sản phẩm
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DANH MỤC SẢN PHẨM</h6>
        </div>
        <div class="row" style="margin: 15px">
            <div class="col-lg-6">

                <form role="form" action="{{route('category.store')}}" method="post">
                    @csrf

{{--                Hoặc viết     <input type="hidden" name="_token" value="{{csrf_token()}}">     = @csrf      --}}

                    <fieldset class="form-group">
                        <label>Tên danh mục</label>
                        <input class="form-control" name="name" placeholder="Nhập tên danh mục sản phẩm">
                    </fieldset>

                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select class="form-control" name="status">
                            <option value="1">Hiển thị</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Thêm mới</button>
                    <button type="reset" class="btn btn-primary">Hủy bỏ</button>

                </form>

            </div>
        </div>
    </div>
    <!-- /.row -->


@endsection
