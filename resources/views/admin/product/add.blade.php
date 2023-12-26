@extends('admin.main')

@section('admin.head')
<!-- summernote -->
<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
@endsection

@section('content')
<div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                    <label for="menu">Tên sản phẩm</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name"
                        placeholder="Nhập tên sản phẩm">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Chuyên mục (*)</label>
                    <select class="form-control" name="category_id">
                        <option>-- Chọn chuyên mục --</option>
                        {!!$htmloption!!}
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="menu">Giá</label>
                    <input type="number" name="price" value="{{ old('price') }}" class="form-control">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="menu">SKU</label>
                    <input type="text" name="sku" value="{{ old('sku') }}" class="form-control">
                </div>
            </div>

        </div>

        <div class="form-group">
            <label for="menu">Slider ảnh sản phẩm</label>
            <input type="file" name="images[]" class="form-control" id="upload_multi" multiple>
            <div id="image_show_multi" style="margin-top: 20px;">

            </div>
            <input type="hidden" name="images_hidden" id="images_hidden">
        </div>
        <div class="form-group">
            <label>Mô tả chi tiết</label>
            <textarea name="content" id="summernote" class="ckeditor form-control">{{ old('content') }}</textarea>

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


        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo sản phẩm</button>
        </div>
        @csrf


    </form>
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