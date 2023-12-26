<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Services\Banner\BannerService;
use App\Http\Services\Cart\CartService;
use App\Http\Services\Introduce\IntroduceService;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\News\NewsService;
use App\Http\Services\Policy\PolicyService;
use App\Http\Services\Product\ProductService;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class WebMainController extends Controller
{
    protected $menuService;
    protected $productService;
    protected $bannerService;
    protected $policyService;
    protected $newService;
    protected $cartService;
    protected $introduceService;
    public function __construct(
        MenuService $menuService,
        ProductService $productService,
        BannerService $bannerService,
        PolicyService $policyService,
        NewsService $newsService,
        CartService $cartService,
        IntroduceService $introduceService
    ) {
        $this->menuService = $menuService;
        $this->productService = $productService;
        $this->bannerService = $bannerService;
        $this->policyService = $policyService;
        $this->newService = $newsService;
        $this->cartService = $cartService;
        $this->introduceService = $introduceService;
    }
    public function home()
    {
        $products = $this->productService->getProductAll();
        $tuya = $this->productService->getBySmarthomeTuya(21);
        foreach ($products as $product) {
            // Truy cập quan hệ imgPro của mỗi sản phẩm
            // Và làm gì đó với nó, ví dụ lấy hình ảnh đầu tiên
            if ($product->imgPro->isNotEmpty()) {
                $firstImage = $product->imgPro->first();
                // Bạn có thể thêm hình ảnh đầu tiên vào thuộc tính của mỗi sản phẩm
                $product->firstImage = $firstImage;
            }
        }

        foreach ($tuya as $product) {
            // Truy cập quan hệ imgPro của mỗi sản phẩm
            // Và làm gì đó với nó, ví dụ lấy hình ảnh đầu tiên
            if ($product->imgPro->isNotEmpty()) {
                $firstImage = $product->imgPro->first();
                // Bạn có thể thêm hình ảnh đầu tiên vào thuộc tính của mỗi sản phẩm
                $product->firstImage = $firstImage;
            }
        }

        $topseling = $this->cartService->topSellingProducts();
        $productData = [];

        foreach ($topseling as $item) {
            $product = $item->product;

            // Kiểm tra xem sản phẩm có tồn tại trong bảng Product không
            if ($product) {
                $images = $item->images->first();

                $productData[] = [
                    'name' => $product,
                    'images' => $images,
                ];
            } else {
                // Nếu sản phẩm không tồn tại trong bảng Product, xóa nó khỏi bảng Cart
                Cart::where('product_id', $item->product_id)->delete();
            }
        }


        $category = Category::where('parent_id', 0)->get();
        $desiredElement = null;
        if ($category->isNotEmpty()) {
            // Lấy ra category đầu tiên
            $parentCategory = $category->first();

            // Lấy danh sách con của category 
            $childrenCategories = $parentCategory->categoryChildrent;
            $slugs = $childrenCategories->pluck('slug')->toArray();
            $desiredElement = $slugs[2];
        }

        return view('Web.home', [
            'title' => "Trang home",
            'product' => $products,
            'banner' => $this->bannerService->getByActive(),
            'newss' => $this->newService->getNewPostv2(),
            'tuya' => $tuya,
            'topseling' =>  $topseling,
            'category' => $category,
            'link' => $desiredElement
        ]);
    }

    public function sanpham($slug, Request $request, $id)
    {
        $sortBy = $request->input('sort_by', 'manual'); // Mặc định là 'manual'
        // dd($sortBy);
        $displaySlug = $slug;
        //dd($displaySlug);
        if ($slug == 'san-pham') {
            $query = Product::query();
        } else {
            $query = Product::query()->where('category_id', $id);
        }



        // Thêm điều kiện active bằng 1 vào query
        $query->where('active', 1);


        switch ($sortBy) {
            case 'price-ascending':
                $query->orderBy('price');
                break;
            case 'price-descending':
                $query->orderByDesc('price');
                break;
            case 'title-ascending':
                $query->orderBy('name', 'asc');
                break;

            case 'title-descending':
                $query->orderBy('name', 'desc');
                break;
            case 'created-ascending':
                $query->orderBy('created_at', 'asc');
                break;

            case 'created-descending':
                $query->orderBy('created_at', 'desc');
                break;
        }


        $products = $query->paginate(36);


        foreach ($products as $product) {
            // Truy cập quan hệ imgPro của mỗi sản phẩm
            // Và làm gì đó với nó, ví dụ lấy hình ảnh đầu tiên
            if ($product->imgPro->isNotEmpty()) {
                $firstImage = $product->imgPro->first();
                // Bạn có thể thêm hình ảnh đầu tiên vào thuộc tính của mỗi sản phẩm
                $product->firstImage = $firstImage;
            }
        }

        $category = Category::where('parent_id', 0)->get();

        return view('Web.product.product-list', [
            'products' => $products,
            'displaySlug' => $displaySlug,
            'category' => $category,
            // 'image' =>  $firstImage,
        ]);
    }






    public function detail($id = '', $slug = '')
    {
        // dd($id);
        $post = $this->productService->getById($id);
        $aaa = $this->productService->getProductItem();
        $Smartswitch = $this->productService->getBySmartswitch($id, $post->category_id);

        //dd($bbb);
        foreach ($aaa as $product) {
            // Truy cập quan hệ imgPro của mỗi sản phẩm
            // Và làm gì đó với nó, ví dụ lấy hình ảnh đầu tiên
            if ($product->imgPro->isNotEmpty()) {
                $firstImage = $product->imgPro->first();
                // Bạn có thể thêm hình ảnh đầu tiên vào thuộc tính của mỗi sản phẩm
                $product->firstImage = $firstImage;
            }
        }

        foreach ($Smartswitch as $product) {
            // Truy cập quan hệ imgPro của mỗi sản phẩm
            // Và làm gì đó với nó, ví dụ lấy hình ảnh đầu tiên
            if ($product->imgPro->isNotEmpty()) {
                $firstImage1 = $product->imgPro->first();
                // Bạn có thể thêm hình ảnh đầu tiên vào thuộc tính của mỗi sản phẩm
                $product->firstImage1 = $firstImage1;
            }
        }



        $category = Category::where('parent_id', 0)->get();

        return view('Web.product.product-detail', [
            'postObject' => $post,
            'productt' => $aaa,
            'smartswitch' => $Smartswitch,
            'category' => $category
        ]);
    }

    public function chinhsach($slug)
    {

        $post = $this->policyService->getPolicyBySlug($slug);
        // dd($slug);

        $category = Category::where('parent_id', 0)->get();
        return view('Web.polyci.polyci-list', [
            'postObject' => $post,
            'category' => $category
        ]);
    }


    public function tintuc($category)
    {


        $post = $this->newService->getPostListByCategory($category);

        $categories = Category::where('parent_id', 0)->get();

        return view('Web.new.new-list', [
            'postObject' => $post,
            'newpost' => $this->newService->getNewPost(),
            'category' => $categories,
        ]);
    }

    public function index($id = '', $slug = '')
    {
        $post = $this->newService->getById($id);
        // dd($post);
        $category = Category::where('parent_id', 0)->get();
        return view('Web.new.new-detail', [
            'postObject' => $post,
            'newpost' => $this->newService->getNewPost(),
            'category' => $category
        ]);
    }

    public function muahang($slug)
    {
        // Chuyển đổi chuỗi thành định dạng thân thiện với URL
        $formattedSlug = Str::slug($slug);

        $post = $this->policyService->getPostListBySlug($formattedSlug);
        $category = Category::where('parent_id', 0)->get();

        return view('Web.polyci.polyci-list', [
            'postObject' => $post,
            'category' => $category
        ]);
    }
    public function search($query)
    {
        $searchQuery = $query;
        //dd($searchQuery);
        $products = Product::where('name', 'like', '%' . $query . '%')->get();
        $productsWithImages = [];

        foreach ($products as $product) {
            // Kiểm tra xem sản phẩm có ảnh không
            if ($product->imgPro->count() > 0) {
                // Lấy ảnh đầu tiên của sản phẩm
                $firstImage = $product->imgPro->first();

                // Thêm thông tin sản phẩm và ảnh vào mảng kết quả
                $productsWithImages[] = [
                    'product' => $product,
                    'firstImage' => $firstImage,
                ];
            }
        }
        $category = Category::where('parent_id', 0)->get();
        return view('Web.search.list', [
            'search' => $searchQuery,
            'itemSearch' => $productsWithImages,
            'category' => $category
        ]);
    }

    public function gioithieu($slug)
    {
        $formattedSlug = Str::slug($slug);

        $post = $this->introduceService->getPostListBySlug($formattedSlug);

        $category = Category::where('parent_id', 0)->get();

        return view('Web.introduce.introduce-list', [
            'postObject' => $post,
            'category' => $category
        ]);
    }
}
