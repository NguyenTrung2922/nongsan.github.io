<?php


namespace App\Http\Services\News;

use App\Models\Category;
use App\Models\Menu;
use App\Models\News;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class NewsService
{

    public function getById($id)
    {
        return News::find($id);
    }
    public function get()
    {
        return News::orderByDesc('id')->paginate(10);
    }

    public function getNewPost()
    {
        return News::orderByDesc('date')->take(4)->get();
    }


    public function getNewPostv2()
    {
        return News::orderByDesc('date')->take(15)->get();
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

                    $id = News::create([
                        'name' => $request->input('title'),
                        'date' => $request->input('date'),
                        'category' => $request->input('category'),
                        'short-description' => $request->input('description'),
                        'thumb' => $pathFullAndName,
                        'content' => $request->input('content'),
                        'author' => $request->input('author')
                    ])->id;

                    Session::flash('success', 'Thêm hoạt động thành công');
                    return $id;
                } catch (\Exception $error) {
                    //dd($error->getMessage());
                    Session::flash('error', 'Upload hình ảnh lỗi 1:' . $error->getMessage());
                    return false;
                }
            } else {
                Session::flash('error', 'Chưa chọn hình ảnh');
                return false;
            }
        } catch (\Exception $err) {

            Session::flash('error', 'Tạo bài viết mới không thành công, xin hãy thử lại');
        }
    }

    public function update($news, $request)
    {
        try {

            $request->except('_token');

            // Biến này sẽ chứa đường dẫn và tên file nếu có
            $pathFullAndName = '';

            // Kiểm tra xem có file được tải lên không
            if ($request->hasFile('file')) {
                $name = $request->file('file')->getClientOriginalName();
                $pathFull = 'banner/';

                // Kiểm tra xem file đã tồn tại chưa
                if (file_exists('storage/banner/' . $name)) {
                    Session::flash('error', 'Ảnh đã tồn tại');
                    return false;
                } else {
                    if ($news->thumb && Storage::exists('public/' . $news->thumb)) {
                        Storage::delete('public/' . $news->thumb);
                    }
                    $request->file('file')->storeAs('public/' . $pathFull, $name);
                    $pathFullAndName = $pathFull . $name; // Cập nhật đường dẫn file
                }
            }

            // Cập nhật bản tin
            $news->name = $request->input('title');
            $news->date = $request->input('date');
            $news->category = $request->input('category');
            $news['short-description'] = $request->input('description');
            $news->thumb = $pathFullAndName ?: $news->thumb;
            $news->content = $request->input('content');
            $news->author = $request->input('author');
            $news->save();
            Session::flash('success', 'Chỉnh sửa thành công');
        } catch (\Exception $err) {
            dd($err->getMessage());
            Session::flash('error', 'Chỉnh sửa bài viết không thành công, xin hãy thử lại');
        }
    }

    public function delete($request)
    {
        $new = News::where('id', $request->input('id'))->first();

        if ($new) {

            try {
                unlink("storage/" . $new->thumb);
            } catch (\Throwable $th) {
                //throw $th;
            }

            $new->delete();
            return true;
        }

        return false;
    }

    public function getPostListByCategory($category)
    {

        $postList = null;

        if ($category == 'tin-tuc') {
            $postList = News::where('category', 'Tin tức')
                ->orderByDesc('id')->paginate(5);
        }



        return [
            'postList' => $postList,

        ];
    }
}
