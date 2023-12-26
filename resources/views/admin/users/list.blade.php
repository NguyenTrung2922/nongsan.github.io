@extends('admin.main')

@section('admin.head')
<!-- summernote -->
<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-block btn-outline-primary btn-lg" data-toggle="modal"
            data-target="#modal-sm">Thêm người dùng mới</button>
    </div>
    <?php
    ?>
    <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="">
                        ID
                    </th>
                    <th style="">
                        Tên đăng nhập
                    </th>
                    <th style="">
                        Email
                    </th>

                    <th style="">
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataList as $key => $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>

                    <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm"
                            onclick="updateRow('{{ $item->id }}', '/admin/user/reset-password')">
                            <i class="fas fa-edit">
                            </i>
                            Reset
                        </a>

                        <a class="btn btn-danger btn-sm" onclick="removeRow('{{ $item->id }}', '/admin/user/destroy')">

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
            {!! $dataList->links() !!}
        </div>
    </div>
    <!-- /.card-body -->

    <div class="modal fade" id="modal-sm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm tài khoản</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Họ và Tên</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="name">
                            </div>


                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="email">
                            </div>

                            <div class="form-group">
                                <label for="name">Mật khẩu</label>
                                <input type="text" class="form-control" id="password" name="password"
                                    placeholder="password">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Lưu</button>
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
    <!-- /.modal -->
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

<script>
CKEDITOR.replace('content');
</script>
@endsection