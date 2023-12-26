@extends('admin.main')

@section('admin.head')
<!-- summernote -->
<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
@endsection

@section('content')
<div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">

        <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
                <label for="menu">Tên danh mục</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="Nhập tên danh mục">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Chuyên mục (*)</label>
                <select class="form-control" name="parent_id">
                    <option value="0">-- Danh mục cha --</option>
                    {!!$htmloption!!}

                </select>
            </div>
        </div>


</div>




<div class="card-footer">
    <button type="submit" class="btn btn-primary">Tạo danh mục</button>
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