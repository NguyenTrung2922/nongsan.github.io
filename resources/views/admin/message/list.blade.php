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
                    <th>
                        Thời gian gửi
                    </th>
                    <th>
                        Người gửi
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Nội dung
                    </th>
                    <th>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($message as $key => $item)
                <tr>
                    <td>{{ date_format(date_create($item->created_at),"H:i:s d/m/Y") }}</td>
                    <td>
                        <a href="#">
                            {{ $item->name }}
                        </a>
                    </td>
                    <td>{{ $item->email }}</td>
                    <td>{{ mb_substr($item->content, 0, 15, "utf-8")}}...</td>
                    <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" href="/admin/messages/view/{{$item->id}}">
                            <i class="fas fa-edit">
                            </i>
                            Xem
                        </a>

                        <a class="btn btn-danger btn-sm" href="#"
                            onclick="removeRow('{{ $item->id }}', '/admin/messages/destroy')">
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
            {{ $message->links('pagination::bootstrap-4') }}
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
@endsection