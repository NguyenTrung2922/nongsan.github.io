<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Banner\BannerService;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    protected $bannerService;
    public function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;
    }
    public function create()
    {
        return view('admin.banner.add', [
            'title' => 'Tạo mới banner',
            'bannerList' => $this->bannerService->getAll()
        ]);
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $this->bannerService->create($request);
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $noti =  $this->bannerService->destroy($request);
        if ($noti) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công slider'
            ]);
        } else {
            return response()->json([
                'error' => false,
                'message' => 'Xóa không thành công mời bạn thử lại'
            ]);
        }
    }
}
