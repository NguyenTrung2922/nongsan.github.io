<?php


namespace App\Http\Services\Banner;

use App\Models\Banner;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BannerService
{

    public function getAll()
    {
        return Banner::orderbyDesc('id')->paginate(10); // tạo mối liên kết với funtion menu tạo trong model Product để liên kết 2 bảng product va menu
    }
    public function getByActive()
    {
        return Banner::where('active', 1)
            ->orderByDesc('id')
            ->take(6)
            ->get();
    }

    public function create($request)
    {

        try {
            $request->except('_token');

            $pathFullAndName = '';

            if ($request->hasFile('file')) {
                try {
                    $name = $request->file('file')->getClientOriginalName();
                    $pathFull = 'banner/';

                    if (file_exists('storage/banner/' . $name) == 1) {
                        Session::flash('error', 'Ảnh đã tồn tại');
                        return false;
                    } else {
                        $request->file('file')->storeAs(
                            'public/' . $pathFull,
                            $name
                        );

                        $pathFullAndName = $pathFull . '/' . $name;
                    }

                    $id = Banner::create([
                        'name' => $request->input('name'),
                        'thumb' => $pathFullAndName,
                        'active' => $request->input('active')
                    ])->id;

                    Session::flash('success', 'Thêm hoạt động thành công');
                    return $id;
                } catch (\Exception $error) {
                    Session::flash('error', 'Upload hình ảnh lỗi 1:' . $error->getMessage());
                    return false;
                }
            } else {
                Session::flash('error', 'Chưa chọn hình ảnh');
                return false;
            }
        } catch (\Exception $err) {
            Session::flash('error', 'Upload hình ảnh lỗi 2:' . $err->getMessage());
            return false;
        }

        return false;
    }

    public function destroy($request)
    {
        $photo = Banner::where('id', $request->input('id'))->first();
        if ($photo) {

            try {
                unlink("storage/" . $photo->thumb);
            } catch (\Throwable $th) {
                //throw $th;
            }

            $photo->delete();
            return true;
        }

        return false;
    }
}
