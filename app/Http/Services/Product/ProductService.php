<?php


namespace App\Http\Services\Product;


use App\Models\Image_Products;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductService
{

    public function getById($id)
    {
        return Product::with('imgPro')->where('id', $id)->first();
    }


    public function getAll()
    {
        return Product::orderbyDesc('id')->paginate(20); // tạo mối liên kết với funtion menu tạo trong model Product để liên kết 2 bảng product va menu
    }

    public function getProductAll()
    {
        return Product::where('active', 1)
            ->orderByDesc('id')
            ->take(36)
            ->get();
    }


    public function getProductItem()
    {
        return Product::where('active', 1)
            ->orderByDesc('id')
            ->take(8)
            ->get();
    }

    // public function getBySmartswitch($slug)
    // {
    //     if ($slug == 'Đầu ghi') {
    //         $query = Product::query()->where(function ($query) {
    //             $query->where('slug', 'Đầu ghi Ip')
    //                 ->orWhere('slug', 'Đầu ghi Analog');
    //         });
    //     }

    //     $products = $query->where('active', 1)
    //         ->orderbyDesc('id')
    //         ->take(6)
    //         ->get();

    //     return $products;
    // }



    public function getBySmartswitch($id, $categoryId)
    {
        // Lấy tất cả sản phẩm liên quan có cùng category_id với sản phẩm hiện tại,
        // nhưng loại trừ sản phẩm đang hiển thị chi tiết
        $relatedProducts = Product::where('category_id', $categoryId)
            ->where('id', '!=', $id)
            ->where('active', 1)
            ->orderBy('id', 'desc')
            ->take(6)
            ->get();

        return $relatedProducts;
    }





    public function getBySmarthomeTuya($categoryId)
    {
        $query = Product::query()
            ->where('category_id', $categoryId)
            ->where('active', 1);

        $products = $query->take(36)->get();

        return $products;
    }



    // public function create($request)
    // {


    //     try {
    //         $product =  Product::create([
    //             'name' => (string) $request->input('name'),
    //             'SKU' => (string) $request->input('sku'),
    //             'content' => (string) $request->input('content'),
    //             'slug' => (string) $request->input('slug'),
    //             'price' => (int) $request->input('price'),
    //             'active' => (int) $request->input('active'),
    //         ]);
    //         // Product::create($request->all());
    //         // dd($request->all());
    //         if ($request->hasFile("images")) {
    //             $files = $request->file('images');

    //             foreach ($files as $file) {
    //                 if ($file && $file->isValid()) {

    //                     $imageName = time() . '_' . $file->getClientOriginalName();
    //                     $request['product_id'] = $product->id;
    //                     $request['name'] = $imageName;
    //                     $file->move(public_path('images'), $imageName);
    //                     Image_Products::create([
    //                         'name' => $imageName,
    //                         'product_id' => $product->id
    //                     ]);
    //                 }
    //             }


    //             Session::flash('success', 'Tạo sản phẩm mới thành công');
    //         }
    //         Session::flash('success', 'Tạo sản phẩm thành công');
    //     } catch (\Exception $err) {
    //         dd($err->getMessage());
    //         Session::flash('error', $err->getMessage());
    //         Log::info($err->getMessage());
    //         return false;
    //     }

    //     return true;
    // }



    public function create($request)
    {
        try {
            // Lấy giá trị giá tiền từ request
            $price = (int) $request->input('price');

            // Kiểm tra nếu giá tiền âm, ném một ngoại lệ
            if ($price < 0) {
                throw new \Exception('Giá tiền không được âm');
            }

            // Tạo mới sản phẩm
            $product = Product::create([
                'name' => (string) $request->input('name'),
                'SKU' => (string) $request->input('sku'),
                'content' => (string) $request->input('content'),
                'category_id' => (string) $request->input('category_id'),
                'price' => $price,
                'active' => (int) $request->input('active'),
            ]);

            // Kiểm tra và lưu ảnh
            if ($request->hasFile("images")) {
                $files = $request->file('images');

                foreach ($files as $file) {
                    if ($file && $file->isValid()) {
                        $imageName = time() . '_' . $file->getClientOriginalName();
                        $request['product_id'] = $product->id;
                        $request['name'] = $imageName;
                        $file->move(public_path('images'), $imageName);
                        Image_Products::create([
                            'name' => $imageName,
                            'product_id' => $product->id
                        ]);
                    }
                }
            }

            Session::flash('success', 'Tạo sản phẩm mới thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            Log::info($err->getMessage());
            return false;
        }

        return true;
    }




    // public function update($request, $product)
    // {
    //     try {
    //         $oldImageNames = Image_Products::where('product_id', $product->id)->pluck('name')->toArray();
    //         // Kiểm tra nếu có ảnh mới được tải lên
    //         if ($request->hasFile("images")) {
    //             // Xóa toàn bộ ảnh cũ liên quan đến sản phẩm
    //             Image_Products::where('product_id', $product->id)->delete();
    //             foreach ($oldImageNames as $oldImageName) {
    //                 $oldImagePath = public_path("images") . '/' . $oldImageName;
    //                 if (file_exists($oldImagePath)) {
    //                     unlink($oldImagePath);
    //                 }
    //             }
    //             // Thêm ảnh mới
    //             $files = $request->file("images");
    //             foreach ($files as $file) {
    //                 $imageName = time() . '_' . $file->getClientOriginalName();
    //                 $file->move(public_path("images"), $imageName);
    //                 Image_Products::create([
    //                     'name' => $imageName,
    //                     'product_id' => $product->id
    //                 ]);
    //             }
    //         }

    //         // Cập nhật thông tin sản phẩm
    //         $product->name = $request->input('name');
    //         $product->content = $request->input('content');
    //         $product->slug = $request->input('slug');
    //         $product->price = $request->input('price');
    //         $product->SKU = $request->input('sku');
    //         $product->active = $request->input('active');

    //         // Lưu dữ liệu sản phẩm
    //         $product->save();

    //         Session::flash('success', 'Update sản phẩm thành công');
    //     } catch (\Exception $err) {
    //         Session::flash('error', $err->getMessage());
    //         Log::info($err->getMessage());
    //         return false;
    //     }
    // }

    public function update($request,  $product)
    {
        try {
            // Lấy giá trị giá tiền từ request
            $price = (int) $request->input('price');

            // Kiểm tra nếu giá tiền âm, ném một ngoại lệ
            if ($price < 0) {
                throw new \Exception('Giá tiền không được âm');
            }

            $oldImageNames = Image_Products::where('product_id', $product->id)->pluck('name')->toArray();

            // Kiểm tra nếu có ảnh mới được tải lên
            if ($request->hasFile("images")) {
                // Xóa toàn bộ ảnh cũ liên quan đến sản phẩm
                Image_Products::where('product_id', $product->id)->delete();
                foreach ($oldImageNames as $oldImageName) {
                    $oldImagePath = public_path("images") . '/' . $oldImageName;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
                // Thêm ảnh mới
                $files = $request->file("images");
                foreach ($files as $file) {
                    $imageName = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path("images"), $imageName);
                    Image_Products::create([
                        'name' => $imageName,
                        'product_id' => $product->id
                    ]);
                }
            }

            // Cập nhật thông tin sản phẩm
            $product->name = $request->input('name');
            $product->content = $request->input('content');
            $product->category_id = $request->input('category_id');
            $product->price = $price;
            $product->SKU = $request->input('sku');
            $product->active = $request->input('active');

            // Lưu dữ liệu sản phẩm
            $product->save();

            Session::flash('success', 'Update sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            Log::info($err->getMessage());
            return false;
        }
    }






    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $product = Product::where('id', $id)->first();
        if ($product) {
            $patch = str_replace('storage', 'public',   $product->thumb);  // xóa ảnh trong thư mục public
            Storage::delete($patch);
            $product->delete();

            $images = Image_Products::where('product_id', $product->id)->get();
            foreach ($images as $image) {
                if (File::exists(public_path("images/" . $image->name))) {
                    File::delete(public_path("images/" . $image->name));
                }
            }

            // Xóa các hình ảnh trong bảng Image_Products
            Image_Products::where('product_id', $product->id)->delete();
            return true;
        }
        return false;
    }

    public function show($id)
    {
        return Product::where('id', $id)->where('active', 1)->with('category')->firstOrFail();
    }
}
