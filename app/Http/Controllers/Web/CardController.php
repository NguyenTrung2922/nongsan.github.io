<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Services\Cart\CartService;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CardController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {


        $result = $this->cartService->create($request);

        if ($result === false) {
            return redirect()->back();
        } else {
            return redirect('carts');
        }
    }


    public function show()
    {
        $producGH = $this->cartService->getProduct();
        // dd($producGH);
        foreach ($producGH as $product) {
            // Truy cập quan hệ imgPro của mỗi sản phẩm
            // Và làm gì đó với nó, ví dụ lấy hình ảnh đầu tiên
            if ($product->imgPro->isNotEmpty()) {
                $firstImage = $product->imgPro->first();
                // Bạn có thể thêm hình ảnh đầu tiên vào thuộc tính của mỗi sản phẩm
                $product->firstImage = $firstImage;
            }
        }

        $category = Category::where('parent_id', 0)->get();
        return view('Web.cart.list', [
            'title' => 'Giỏ hàng',
            'productGH' => $producGH,
            'carts' => Session::get('carts'), // lấy sản phẩm trong carts lưu trong Session,
            'category' => $category
        ]);
    }

    public function update(Request $request)
    {



        $result =  $this->cartService->update($request);

        if ($result === false) {
            return redirect()->back();
        } else {
            return redirect('carts');
        }
    }

    public function delete($id = 0)
    {
        $this->cartService->delete($id);
        return redirect('carts');
    }

    public function don()
    {
        $product = $this->cartService->getProduct();
        foreach ($product as $item) {
            // Truy cập quan hệ imgPro của mỗi sản phẩm
            // Và làm gì đó với nó, ví dụ lấy hình ảnh đầu tiên
            if ($item->imgPro->isNotEmpty()) {
                $firstImage = $item->imgPro->first();
                // Bạn có thể thêm hình ảnh đầu tiên vào thuộc tính của mỗi sản phẩm
                $item->firstImage = $firstImage;
            }
        }


        return view('Web.cart.pay', [
            'title' => 'Giỏ hàng',
            'productItem' => $product,
            'carts' => Session::get('carts'),

        ]);
    }

    public function add(Request $request)
    {
        //dd($request->input());
        $this->cartService->addCart($request);
        return redirect()->back();
    }
}
