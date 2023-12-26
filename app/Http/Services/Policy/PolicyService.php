<?php


namespace App\Http\Services\Policy;


use App\Models\Image_Products;
use App\Models\Menu;
use App\Models\Policy;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PolicyService
{

    public function getAll()
    {
        return Policy::orderby('id')->paginate(20);
    }
    public function create($request)
    {
        try {
            Policy::create([
                'name' => $request->input('name'),
                'content' => $request->input('content'),
                'slug' => $request->input('slug')
            ]);
            Session::flash('success', 'Tạo chính sách mới thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Tạo chính sách mới không thành công, xin hãy thử lại');
        }
    }

    public function update($policy, $request)
    {
        try {
            $policy->name = $request->input('name');
            $policy->content = $request->input('content');
            $policy->slug = $request->input('slug');
            $policy->save();
            Session::flash('success', 'Chỉnh sửa chính sách mới thành công');
        } catch (\Exception $err) {

            Session::flash('error', 'Chỉnh sửa danh sách không thành công, xin hãy thử lại');
        }
    }

    public function delete($request)
    {
        $policy = Policy::where('id', $request->input('id'))->first();
        if ($policy) {

            $policy->delete();
            return true;
        }

        return false;
    }

    public function getPostListBySlug($slug)
    {
        $postList = null;

        if ($slug == 'huong-dan-mua-hang') {
            $postList = Policy::where('slug', 'Hướng dẫn mua hàng')->firstOrFail();
        }


        return [
            'postList' => $postList,
        ];
    }


    // public function getPolicyBySlug($slug)
    // {
    //     $postList = null;

    //     if ($slug == 'chinh-sach') {
    //         $postList = Policy::where('slug', 'Chính sách')->firstOrFail();
    //     } else if ($slug == 'chinh-sach-van-chuyen') {
    //         $postList = Policy::where('slug', 'Chính sách vận chuyển')->firstOrFail();
    //     } else if ($slug == 'chinh-sach-doi-tra') {
    //         $postList = Policy::where('slug', 'Chính sách đổi trả')->firstOrFail();
    //     } else if ($slug == 'chinh-sach-bao-mat') {
    //         $postList = Policy::where('slug', 'Chính sách bảo mật')->firstOrFail();
    //     } else if ($slug == 'chinhsachdaily') {
    //         $postList = Policy::where('slug', 'Chính sách đại lý')->firstOrFail();
    //     } else if ($slug == 'phuong-thuc-thanh-toan') {
    //         $postList = Policy::where('slug', 'Phương thức thanh toán')->firstOrFail();
    //     } else if ($slug == 'thong-tin-chuyen-khoan') {
    //         $postList = Policy::where('slug', 'Thông tin chuyển khoản')->firstOrFail();
    //     } else {
    //         $postList = Policy::where('slug', 'Hướng dẫn mua hàng')->firstOrFail();
    //     }


    //     return [
    //         'postList' => $postList,
    //     ];
    // }

    public function getPolicyBySlug($slug)
    {
        $postList = null;
        $policies = [
            'chinh-sach' => 'Chính sách',
            'chinh-sach-van-chuyen' => 'Chính sách vận chuyển',
            'chinh-sach-doi-tra' => 'Chính sách đổi trả',
            'chinh-sach-bao-mat' => 'Chính sách bảo mật',
            'chinhsachdaily' => 'Chính sách đại lý',
            'phuong-thuc-thanh-toan' => 'Phương thức thanh toán',
            'thong-tin-chuyen-khoan' => 'Thông tin chuyển khoản',
            'huong-dan-mua-hang' => 'Hướng dẫn mua hàng',
        ];

        // Kiểm tra xem $slug có trong mảng policies không
        // Nếu có, sử dụng nó để truy vấn cơ sở dữ liệu
        if (array_key_exists($slug, $policies)) {
            $postList = Policy::where('slug', $policies[$slug])->firstOrFail();
        }

        return [
            'postList' => $postList,
        ];
    }
}
