@extends('admin.main')

@section('admin.head')
<!-- summernote -->
<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
@endsection

@section('content')
<div class="card-body p-0">
    <table class="table table-striped projects">
        <thead>
            <tr>
                <th style="width: 1%">ID</th>
                <th style="width: 15%">Tên danh mục</th>
                <th style="width: 20%">Slug</th>
                <th style="width: 10%">Update</th>
                <th style="width: 20%">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($htmloption as $key=> $category)
            <tr>

                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->slug}}</td>
                <td>{{$category->updated_at}}</td>


                <td class="project-actions text-right">
                    <a class="btn btn-primary btn-sm" href="/admin/categorys/edit/{{$category->id}}">
                        <i class="fas fa-edit"></i>
                    </a>

                    <a class="btn btn-danger btn-sm" href="#"
                        onclick="removeRow('{{ $category->id }}', '/admin/categorys/destroy')">

                        <i class="fas fa-trash"></i>
                    </a>


                </td>


            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="col-md-12 d-flex justify-content-center">
        {{ $htmloption->links('pagination::bootstrap-4') }}
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

<script>
CKEDITOR.replace('content');
</script>
@endsection