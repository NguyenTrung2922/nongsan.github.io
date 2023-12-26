<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\MenuService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }
    public function index()
    {
        $option = $this->menuService->menuRecusiveAdd();
        return view('admin.menu.add', [
            'title' => 'Thêm menu mới',
            'option' => $option
        ]);
    }


    public function store(Request $request)
    {
        $this->menuService->create($request);
        return redirect()->back();
    }

    public function view()
    {
        $htmloption = $this->menuService->getAll();
        return view('admin.menu.list', [
            'title' => 'Thêm menu mới',
            'htmloption' => $htmloption
        ]);
    }

    public function show($id)
    {
        $data = $this->menuService->getbyId($id);
        $option = $this->menuService->menuRecusiveupdate($data->parent_id);
        return view('admin.menu.edit', [
            'title' => 'Update menu ',
            'menu' => $data,
            'option' => $option
        ]);
    }

    public function update($id, Request $request)
    {
        $this->menuService->update($id, $request);
        return redirect('/admin/menus/list');
    }

    public function destroy(Request $request)
    {
        $result = $this->menuService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công sản phẩm'
            ]);
        }

        return response()->json(['error' => true]);
    }
}
