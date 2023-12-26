<?php


namespace App\Http\Services\Introduce;


use App\Models\Image_Products;
use App\Models\Introduce;
use App\Models\Menu;
use App\Models\Policy;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class IntroduceService
{

    public function getAll()
    {
        return Introduce::orderby('id')->paginate(20);
    }
    public function create($request)
    {
        try {
            Introduce::create([
                'name' => $request->input('name'),
                'content' => $request->input('content'),
                'slug' => $request->input('slug')
            ]);
            Session::flash('success', 'Tạo trang thành công');
        } catch (\Exception $err) {
            // dd($err->getMessage());
            Session::flash('error', 'Tạo trang mới không thành công, xin hãy thử lại');
        }
    }

    public function update($introduce, $request)
    {
        try {
            $introduce->name = $request->input('name');
            $introduce->content = $request->input('content');
            $introduce->slug = $request->input('slug');
            $introduce->save();
            Session::flash('success', 'Chỉnh sửa trang thành công');
        } catch (\Exception $err) {
            //dd($err->getMessage());
            Session::flash('error', 'Chỉnh sửa trang không thành công, xin hãy thử lại');
        }
    }

    public function delete($request)
    {
        $introduce = Introduce::where('id', $request->input('id'))->first();
        if ($introduce) {

            $introduce->delete();
            return true;
        }

        return false;
    }

    public function getPostListBySlug($slug)
    {
        $postList = null;
        if ($slug == 'gioi-thieu') {
            $postList = Introduce::where('slug', 'Giới thiệu')
                ->firstOrFail();
        } else {
            $postList = Introduce::where('slug', 'Đại lý')
                ->firstOrFail();
        }


        return [
            'postList' => $postList,

        ];
    }
}
