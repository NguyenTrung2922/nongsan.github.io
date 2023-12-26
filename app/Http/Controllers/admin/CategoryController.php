<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Category\CategoryService;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function create()
    {
        $data = Category::all();
        $htmloption = $this->getCategory($parentId = '');
        return view('admin.category.add', [
            'title' => 'Thêm danh mục mới',
            'htmloption' => $htmloption

        ]);
    }

    public function store(Request $request)
    {
        $this->categoryService->create($request);
        return redirect()->back();
    }

    public function index()
    {
        $htmloption = $this->categoryService->get();
        return view('admin.category.list', [
            'title' => 'Danh sách danh mục',
            'htmloption' => $htmloption

        ]);
    }

    public function getCategory($parentId)
    {
        $data = Category::all();
        $htmloption = $this->categoryService->categoryRecusive($parentId, $data);

        return  $htmloption;
    }

    public function show($id)
    {
        $data = $this->categoryService->getbyId($id);
        $htmloption = $this->getCategory($data->parent_id);
        return view('admin.category.edit', [
            'title' => 'Chỉnh sửa danh mục',
            'category' => $data,
            'htmloption' => $htmloption

        ]);
    }

    public function update($id, Request $request)
    {
        $data = $this->categoryService->update($id, $request);
        return redirect('/admin/categorys/list');
    }

    public function destroy(Request $request)
    {
        $result = $this->categoryService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công sản phẩm'
            ]);
        }

        return response()->json(['error' => true]);
    }
}
