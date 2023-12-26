<?php


namespace App\Http\Services\Category;

use App\Models\Banner;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CategoryService
{

    public function get()
    {
        return Category::orderbyDesc('id')->paginate(20);
    }

    public function getbyId($id)
    {
        return Category::find($id);
    }
    private $htmlSelect = '';




    public function categoryRecusive($parentId, $categories, $id = 0, $test = '')
    {
        foreach ($categories as $value) {
            if ($value['parent_id'] == $id) {
                if (!empty($parentId) && $parentId == $value['id']) {
                    $this->htmlSelect .= "<option selected value='" . $value['id'] . "'>" . $test . $value['name'] . "</option>";
                } else {
                    $this->htmlSelect .= "<option  value='" . $value['id'] . "'>" . $test . $value['name'] . "</option>";
                }

                $this->categoryRecusive($parentId, $categories, $value['id'], $test . '-');
            }
        }
        return $this->htmlSelect;
    }

    public function create($request)
    {
        try {
            Category::create([
                'name' => $request->input('name'),
                'parent_id' => $request->input('parent_id'),
                'slug' => $request->input('name')
            ]);
            Session::flash('success', 'Tạo category mới thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Tạo category mới không thành công, hãy thử lại');
        }
    }

    public function update($id, $request)
    {
        $data = $this->getbyId($id);
        try {
            $data->name = $request->input('name');
            $data->parent_id = $request->input('parent_id');
            $data->slug = $request->input('name');
            $data->save();
            Session::flash('success', 'Update category thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Update category  không thành công, hãy thử lại');
        }
    }


    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $product = Category::where('id', $id)->first();
        if ($product) {

            $product->delete();

            return true;
        }
        return false;
    }
}
