<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Category\CategoryService;
use App\Http\Services\Product\ProductService;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;
    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }
    public function create()
    {
        $data = Category::all();
        $htmloption = $this->getCategory($parentId = '');
        return view('admin.product.add', [
            'title' => 'Tạo mới sản phẩm',
            'htmloption' => $htmloption
        ]);
    }

    public function getCategory($parentId)
    {
        $data = Category::all();
        $htmloption = $this->categoryService->categoryRecusive($parentId, $data);

        return  $htmloption;
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->productService->create($request);
        return redirect()->back();
    }

    public function index()
    {

        return view('admin.product.list', [
            'title' => 'Danh sách sản phẩm',
            'products' => $this->productService->getAll(),

        ]);
    }

    public function show(Product $product)
    {
        $htmloption = $this->getCategory($product->category_id);
        return view('admin.product.edit', [
            'title' => 'Sửa sản phẩm',
            'products' => $product,
            'haha' => $product->imgPro,
            'htmlOption' => $htmloption
        ]);
    }

    public function update(Product $product, Request $request)
    {

        $this->productService->update($request, $product);
        return redirect('/admin/products/list');
    }

    public function destroy(Request $request)
    {
        $result = $this->productService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công sản phẩm'
            ]);
        }

        return response()->json(['error' => true]);
    }
}
