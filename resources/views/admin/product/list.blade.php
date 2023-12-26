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
                <th style="width: 15%">Tên sản phẩm</th>
                <th style="width: 10%">Danh mục</th>
                <th style="width: 10%">Giá </th>
                <th style="width: 10%">SKU</th>
                <th style="width: 10%">Active</th>
                <th style="width: 10%">Update</th>
                <th style="width: 20%">Thumb</th>
                <th style="width: 20%">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key=> $product)
            <tr>

                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{ optional($product->category)->name }}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->SKU}}</td>
                <td>{!! \App\Helpers\Helper::active($product->active) !!}</td>
                <td>{{$product->updated_at}}</td>
                <td>
                    @foreach (json_decode($product->imgPro) as $image)
                    <img src="{{ asset('images/' . $image->name) }}" width="100" alt="{{ $image->name }}">
                    @endforeach
                </td>

                <td class="project-actions text-right">
                    <a class="btn btn-primary btn-sm" href="/admin/products/edit/{{$product->id}}">
                        <i class="fas fa-edit"></i>
                    </a>

                    <a class="btn btn-danger btn-sm" href="#" onclick="removeRow('{{ $product->id }}', '/admin/products/destroy')">

                        <i class="fas fa-trash"></i>
                    </a>


                </td>


            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="col-md-12 d-flex justify-content-center">
        {{ $products->links('pagination::bootstrap-4') }}
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