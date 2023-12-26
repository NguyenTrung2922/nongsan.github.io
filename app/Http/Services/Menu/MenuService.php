<?php


namespace App\Http\Services\Menu;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MenuService
{
    public function getbyId($id)
    {
        return Menu::find($id);
    }
    private $html = '';
    public function menuRecusiveAdd($parentId = 0, $subMark = '')
    {
        $data = Menu::where('parent_id', $parentId)->get();
        foreach ($data as $dataItem) {
            $this->html .= '<option value ="' . $dataItem->id . '">' . $subMark . $dataItem->name . ' </option>';
            $this->menuRecusiveAdd($dataItem->id, $subMark . '--');
        }
        return $this->html;
    }

    public function menuRecusiveupdate($parentIdUpdate, $parentId = 0, $subMark = '')
    {
        $data = Menu::where('parent_id', $parentId)->get();
        foreach ($data as $dataItem) {
            if ($parentIdUpdate == $dataItem->id) {
                $this->html .= '<option selected value ="' . $dataItem->id . '">' . $subMark . $dataItem->name . ' </option>';
            } else {
                $this->html .= '<option value ="' . $dataItem->id . '">' . $subMark . $dataItem->name . ' </option>';
            }

            $this->menuRecusiveupdate($parentIdUpdate, $dataItem->id, $subMark . '--');
        }
        return $this->html;
    }
    public function getAll()
    {
        return Menu::orderby('id')->paginate(20);
    }

    public function getParent()
    {
        return Menu::where('parent_id', 0)->get();
    }
    public function create($request)
    {
        try {
            Menu::create([                     // create item mới dùng model Menu 
                'name' => (string) $request->input('name'),
                'parent_id' => (int) $request->input('parent_id'),
                'slug' => Str::slug($request->input('name')),
            ]);

            Session::flash('success', 'Tạo danh mục thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $menu = Menu::where('id', $id)->first();
        if ($menu) {
            $menu->delete();
            return true;
        }
        return false;
    }


    public function update($id, $request)
    {
        $data = $this->getbyId($id);
        try {
            $data->name = $request->input('name');
            $data->parent_id = $request->input('parent_id');
            $data->slug = Str::slug($request->input('name'));
            $data->save();
            Session::flash('success', 'Update category thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Update category  không thành công, hãy thử lại');
        }
    }
}
