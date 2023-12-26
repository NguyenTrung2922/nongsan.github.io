<?php


namespace App\Http\Services\Cart;

use App\Models\Banner;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CartService
{
    public function create($request)
    {

        $cty = (int) $request->input('quantity');
        $idSP = (int) $request->input('product_id');

        if ($cty <= 0 || $idSP <= 0) {
            Session::flash('error', 'Số lượng hoặc sản phẩm không chính xác');
            return false;
        }

        $carts = Session::get('carts');
        if (is_null($carts)) {       // nếu trong giỏ hàng chưa có sản phẩm nào thì tạo mới sản phẩm
            Session::put('carts', [     // put $idSP và số lượng đặt hàng $cty
                $idSP => $cty
            ]);

            return true;
        }

        $exists = Arr::exists($carts, $idSP);  // check xem sản phẩm đã tồn tại trong giỏ hàng chưa
        if ($exists) {
            $carts[$idSP] = $carts[$idSP] + $cty;

            Session::put('carts', $carts);

            return true;
        }



        $carts[$idSP] = $cty;
        Session::put('carts', $carts);

        return true;
    }

    public function getProduct()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $pro_id = array_keys($carts);


        // dd($aa);
        return Product::select('id', 'name', 'price')->where('active', 1)->whereIn('id', $pro_id)->get();
    }

    public function update($request)
    {
        Session::put('carts', $request->input('quantity'));
        return true;
    }

    public function delete($id)
    {
        $carts = Session::get('carts');  // lấy dữ liệu trong giỏ hàng
        unset($carts[$id]);       // xóa sản phẩm theo id sản phẩm
        Session::put('carts', $carts); // cập nhật lại giỏ hàng
        return true;
    }

    public function addCart($request)
    {
        try {
            DB::beginTransaction();
            $carts = Session::get('carts');

            if (is_null($carts)) return false;

            $customer = Customer::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'province' => $request->input('province'),
            ]);
            $this->infoProductCart($carts, $customer->id);
            DB::commit();
            Session::flash('Đặt hàng thành công');


            Session::forget('carts');    // xóa Session khi đạt hàng thành công
        } catch (\Exception $err) {
            DB::rollBack();
            dd($err->getMessage());
            Session::flash('error', 'Đặt hàng không thành công');
            return false;
        }

        return true;
    }

    protected function infoProductCart($carts, $customer_id)
    {
        $productId = array_keys($carts);
        $products = Product::select('id', 'name', 'price')
            ->where('active', 1)->whereIn('id', $productId)->get();

        $data = [];
        foreach ($products as $key => $product) {
            $data[] = [
                'customer_id' => $customer_id,
                'product_id' => $product->id,
                'qty' => $carts[$product->id],
                'price' =>  $product->price
            ];
        }

        return Cart::insert($data);
    }


    //Admin Service

    public function getCustomer()
    {
        return Customer::orderBy('id')->paginate(10);
    }

    public function getItem($customer)
    {
        return $customer->carts()->with('product.imgPro')->get();
    }

    public function destroy($request)
    {
        $id = $request->input('id');
        $slider = Customer::where('id', $id)->first();
        if ($slider) {
            $slider->delete();
            return true;
        }
        return false;
    }

    public function topSellingProducts()
    {
        return Cart::select('product_id', DB::raw('SUM(qty) as qty'))
            ->groupBy('product_id')
            ->orderBy('qty', 'desc')
            ->take(12)
            ->get();
    }
}
