@extends('admin.main')

@section('admin.head')
<!-- summernote -->
<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
@endsection

@section('content')
<div class="card-body">

    <div class="card-header">
        <button type="button" class="btn btn-block btn-outline-primary btn-lg" data-toggle="modal" data-target="#modal-sm">Upload hình ảnh</button>
    </div>

    <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">
                        ID
                    </th>
                    <th style="width: 20%">
                        Tên
                    </th>
                    <th style="width: 30%">
                        Hình ảnh
                    </th>
                    <th style="width: 20%">
                        Kích hoạt
                    </th>
                    <th style="width: 20%">
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($bannerList as $key => $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        <a>
                            {{ $item->name }}
                        </a>
                    </td>
                    <td>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <img src={{ "/storage/" . $item->thumb }} style="height: 100px">
                            </li>
                        </ul>
                    </td>
                    <td>{!! \App\Helpers\Helper::active( $item->active) !!}</td>
                    <td class="project-actions text-right">

                        <a class="btn btn-danger btn-sm" onclick="removeRow('{{ $item->id }}', '/admin/banners/destroy')">
                            <i class="fas fa-trash">
                            </i>
                            Xóa
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="card-footer clearfix">
            {!! $bannerList->links() !!}
        </div>
    </div>

    <div class="modal fade" id="modal-sm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload hình ảnh</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Tên hình ảnh</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên hình ảnh">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Hình ảnh</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file" name="file" accept="image/*">
                                        <label class="custom-file-label" for="exampleInputFile">Chọn hình ảnh</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="form-group">
                                <label>Kích hoạt</label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" value="1" id="active" name="active" checked="">
                                    <label for="active" class="custom-control-label">Có</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" value="0" id="no_active" name="active">
                                    <label for="no_active" class="custom-control-label">Không</label>
                                </div>

                            </div>
                        </div>

                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                        @csrf
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

</div>
@endsection

@section('admin.footer-js')
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()
    })
</script>

<script src="/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
@endsection