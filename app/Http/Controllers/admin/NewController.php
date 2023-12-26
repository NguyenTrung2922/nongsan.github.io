<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\News\NewsService;
use App\Models\News;
use Illuminate\Http\Request;

class NewController extends Controller
{
    protected $newsService;
    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }
    public function create()
    {
        return view('admin.news.add', [
            'title' => 'Tạo mới tin tức'
        ]);
    }

    public function store(Request $request)
    {
        $this->newsService->create($request);
        return redirect()->back();
    }

    public function index()
    {
        return view('admin.news.list', [
            'title' => 'Danh sách tin tức',
            'news' => $this->newsService->get()
        ]);
    }

    public function  show(News $news)
    {
        return view('admin.news.edit', [
            'title' => 'Chỉnh sửa tin tức',
            'new' => $news
        ]);
    }
    public function update(News $news, Request $request)
    {
        $this->newsService->update($news, $request);
        return redirect('/admin/news/list');
    }

    public function destroy(Request $request)
    {
        $result = $this->newsService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công chính sách'
            ]);
        }

        return response()->json(['error' => true]);
    }
}
