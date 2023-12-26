<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Cart\CartService;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    public function index()
    {
        $customer = $this->cartService->getCustomer();
        return view('admin.cart.list', [
            'title' => 'Danh sách đơn hàng',
            'customer' => $customer
        ]);
    }

    public function view(Customer $customer)
    {
        $carts = $this->cartService->getItem($customer);
        $cartData = [];
        foreach ($carts as $item) {
            $product = $item->product;
            $images = $product->imgPro; // Mảng các hình ảnh từ quan hệ imgPro
            $firstImage = $images->first();
            $cartData[] = [
                'product' => $product,
                'firstImage' => $firstImage,
                'qty' => $item->qty,
            ];
        }





        return view('admin.cart.detail', [
            'title' => 'Chi tiết đơn hàng',
            'customer' => $customer,
            'cart' => $cartData,

        ]);
    }

    public function destroy(Request $request)
    {
        $noti =  $this->cartService->destroy($request);
        if ($noti) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công đơn hàng'
            ]);
        } else {
            return response()->json([
                'error' => false,
                'message' => 'Xóa không thành công mời bạn thử lại'
            ]);
        }
    }

    public function update(Customer $customer, Request $request)
    {
        try {
            $customer->status = $request->input('status');
            $customer->save();
            Session::flash('success', 'Update trạng thái thành công');

            return response()->json(['success' => true, 'message' => 'Update trạng thái thành công']);
        } catch (\Exception $err) {
            Session::flash('error', 'Update trạng thái không thành công, hãy thử lại');

            return response()->json(['success' => false, 'message' => 'Update trạng thái không thành công']);
        }
    }
}
