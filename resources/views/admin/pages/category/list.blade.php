@extends('admin.layouts.master')
@section('title')
    Danh mục sản phẩm
@endsection
@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DANH MỤC SẢN PHẨM</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên danh mục</th>
                        <th>Slug</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Tên danh mục</th>
                        <th>Slug</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php $stt = 1; ?>
                    @foreach($category as $key => $categories)
                        <tr>
                            <th><?php echo $stt++; ?></th>
                            <td>{{$categories->name}}</td>
                            <td>{{$categories->slug}}</td>
                            <td>
                            @if($categories->status == 1)
                                {{"Hiển thị"}}
                            @else
                                {{"Ẩn"}}
                            @endif
                            <td>{{$categories->created_at}}</td>
                            <td>
                                <button class="btn btn-primary edit" data-toggle="modal" data-target="#edit"
                                        data-id="{{$categories->id}}" title="{{"Sửa ".$categories->name}}"><i
                                        class="fas fa-edit"></i></button>
                                <button class="btn btn-danger remove" data-toggle="modal" data-target="#delete"
                                        data-id="{{$categories->id}}" title="{{"Xóa ".$categories->name}}"><i
                                        class="fas fa-trash-alt"></i></button>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$category->links()}}
            </div>
        </div>
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa danh mục:<span
                                class="titleCategory"></span></h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row" style="margin: 5px">
                            <div class="col-lg-12">
                                <form role="form">
                                    @csrf
                                    <fieldset class="form-group">
                                        <label>Tên danh mục</label>
                                        <input class="form-control nameCategory" name="name"
                                               placeholder="Nhập tên danh mục">
                                        <span class="error"
                                              style="font-size: 14px;color: red;margin-top: 7px;width: 30rem"></span>
                                    </fieldset>
                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select class="form-control statusCategory" name="status">
                                            <option class="activeCategory" value="1">Hiển thị</option>
                                            <option class="unactiveCategory" value="0">Ẩn</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-id="{{$categories->id}}" class="btn btn-success update">Lưu lại
                        </button>
                        <button class="btn btn-secondary" data-id="{{$categories->id}}" type="button"
                                data-dismiss="modal">Hủy bỏ
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- delete Modal-->
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa ?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body" style="margin-left: 183px;">
                        <button type="button" class="btn btn-success del">Có</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
