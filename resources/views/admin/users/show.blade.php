@extends('admin.main')

@section('admin.head')
<!-- summernote -->
<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
@endsection

@section('content')
<form action="" method="POST">
    <div class="row">
        <div class="col-8">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        Thông cá nhân
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mã người dùng</label>
                        <input type="text" class="form-control" name="id" value="{{ $data->id }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên</label>
                        <input type="text" class="form-control" name="name" value="{{ $data->name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" name="email" value="{{ $data->email }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Tạo mật khẩu mới</label>
                        <input type="text" class="form-control" name="newexp">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        Xác nhận sửa thông tin cá nhân
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary" data-dismiss="modal">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
    @csrf
</form>
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