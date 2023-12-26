@extends('admin.main')

@section('admin.head')
<!-- summernote -->
<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
@endsection

@section('content')
<div class="card-body">
    <form action="" method="post">

        <div class="row">
            <div class="col-sm-6">
                <!-- text input -->
                <div class="form-group">
                    <label for="menu">Tên sản phẩm</label>
                    <input type="text" name="name" value="{{ $policy->name }}" class="form-control" id="name"
                        placeholder="Nhập tên sản phẩm">
                </div>
            </div>

        </div>




        <div class="form-group">
            <label>Mô tả chi tiết</label>
            <textarea name="content" id="summernote" class="ckeditor form-control">{{ $policy->content }}</textarea>

        </div>

        <div class="form-group">
            <label>Chuyên mục (*)</label>
            <select class="form-control" name="slug" disabled>
                <option>-- Chọn chuyên mục --</option>
                <option {{ $policy->slug == 'Chính sách' ? 'selected':''  }}>Chính sách</option>
                <option {{ $policy->slug == 'Chính sách vận chuyển' ? 'selected':''  }}>Chính sách vận chuyển</option>
                <option {{ $policy->slug == 'Chính sách đổi trả' ? 'selected':''  }}>Chính sách đổi trả</option>
                <option {{ $policy->slug == 'Chính sách bảo mật' ? 'selected':''  }}>Chính sách bảo mật</option>
                <option {{ $policy->slug == 'Chính sách đại lý' ? 'selected':''  }}>Chính sách đại lý</option>
                <option {{ $policy->slug == 'Phương thức thanh toán' ? 'selected':''  }}>Phương thức thanh toán</option>
                <option {{ $policy->slug == 'Thông tin chuyển khoản' ? 'selected':''  }}>Thông tin chuyển khoản</option>
                <option {{ $policy->slug == 'Hướng dẫn mua hàng' ? 'selected':''  }}>Hướng dẫn mua hàng</option>
            </select>
        </div>


        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update chính sách</button>
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