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
                <th style="width: 15%">Tên chính sách</th>
                <th style="width: 10%">Nội dung</th>
                <th style="width: 10%">Update</th>
                <th style="width: 20%">&nbsp;</th>
            </tr>
        </thead>
        <tbody>


            @foreach($introduces as $key=> $policys)

            @php
            $html = $policys->content;
            $text = strip_tags($html);

            $text = preg_replace('/\s+/', ' ', $text);
            $text = html_entity_decode($text);
            @endphp
            <tr>

                <td>{{$policys->id}}</td>
                <td>{{$policys->name}}</td>
                <td> {!!$text!!}</td>
                <td>{{$policys->updated_at}}</td>


                <td class="project-actions text-right">
                    <!-- <a class="btn btn-primary btn-sm" href="/admin/introduces/edit/{{$policys->id}}">
                        <i class="fas fa-edit"></i>
                    </a> -->

                    <a class="btn btn-danger btn-sm" href="#"
                        onclick="removeRow('{{ $policys->id }}', '/admin/introduces/destroy')">

                        <i class="fas fa-trash"></i>
                    </a>
                </td>


            </tr>
            @endforeach
        </tbody>
    </table>


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