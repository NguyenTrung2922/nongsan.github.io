@extends('admin.main')

@section('admin.head')
<!-- summernote -->
<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
@endsection

@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-8">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        Chi tiết
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tiêu đề (*)</label>
                        <input type="text" class="form-control" name="title" value="{{ $new->name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mô tả ngắn (*)</label>
                        <input type="text" class="form-control" name="description" value="{{ $new['short-description'] }}">
                    </div>

                    <div class="form-group">
                        <label>Ngày tạo:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="date" value="{{$new->date}}">
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Hình ảnh</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="file" accept="image/*">
                                <label class="custom-file-label" for="exampleInputFile">Chọn hình ảnh</label>
                            </div>
                        </div>
                        <img id="image-preview" src={{ "/storage/" . $new->thumb }} style="height: 200px">
                    </div>
                    <textarea id="summernote" name="content">
                    {{ $new->content }}
                    </textarea>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        Thông tin bổ sung
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary" data-dismiss="modal">Lưu</button>
                    </div>

                    <div class="form-group">
                        <label>Chuyên mục (*)</label>
                        <select class="form-control" name="category">
                            <option>-- Chọn chuyên mục --</option>
                            <option {{ $new->category == 'Tin tức' ? 'selected' : '' }}>Tin tức</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tác giả (*)</label>
                        <input type="text" class="form-control" name="author" value="{{ $new->author}}">
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
    $(document).ready(function() {
        // Khi file trong input thay đổi
        $('#file').on('change', function() {
            // Nếu có file được chọn
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                // Khi file được load
                reader.onload = function(e) {
                    // Cập nhật src của img để hiển thị hình ảnh mới
                    $('#image-preview').attr('src', e.target.result);
                }

                // Đọc file ảnh dưới dạng URL dữ liệu
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
</script>

<script>
    CKEDITOR.replace('content');
</script>
@endsection