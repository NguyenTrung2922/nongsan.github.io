@extends('admin.main')

@section('admin.head')
<!-- summernote -->
<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
@endsection

@section('content')
<div class="col-md-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Tin nhắn</h3>


        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="mailbox-read-info">
                <h5>Tin nhắn</h5>
                <h6>Từ: {{$data->email}}
                    <span class="mailbox-read-time float-right">{{ date_format(date_create($data->created_at),"H:i:s d/m/Y") }}</span>
                </h6>
            </div>
            <!-- /.mailbox-controls -->
            <div class="mailbox-read-message">
                <p>
                    {{$data->content}}
                </p>


            </div>
            <!-- /.mailbox-read-message -->
        </div>
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