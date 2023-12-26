@extends('admin.main')

@section('admin.head')
<!-- summernote -->
<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <!-- <button type="button" class="btn btn-block btn-outline-primary btn-lg" data-toggle="modal" data-target="#modal-sm">Upload hình ảnh</button> -->
    </div>
    <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">
                        ID
                    </th>
                    <th style="width: 20%">
                        Tiêu đề
                    </th>
                    <th style="width: 20%">
                        Danh mục
                    </th>
                    <th style="width: 20%">
                        Ngày tạo
                    </th>
                    <th style="width: 20%">
                        Ngày sửa
                    </th>
                    <th style="width: 20%">
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $key => $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        <a href="#">
                            {{ $item->name }}
                        </a>
                    </td>
                    <td>{{ $item->category }}</td>
                    <td>{{ date_format(date_create($item->date),"H:i:s d/m/Y") }}</td>
                    <td>{{ date_format(date_create($item->updated_at),"H:i:s d/m/Y") }}</td>
                    <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" href="/admin/news/edit/{{$item->id}}">
                            <i class="fas fa-edit">
                            </i>
                            Sửa
                        </a>

                        <a class="btn btn-danger btn-sm" onclick="removeRow('{{ $item->id }}', '/admin/news/destroy')">
                            <i class="fas fa-trash">
                            </i>
                            Xóa
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="col-md-12 d-flex justify-content-center" style="margin-top: 30px;">
            {{ $news->links('pagination::bootstrap-4') }}
        </div>
    </div>
    <!-- /.card-body -->
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