<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.list', [
            'title' => 'Danh sách tài khoản',
            'dataList' => $this->userService->getList()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $photoId = $this->userService->insert($request);

        return redirect()->back();
    }

    public function resetPassword(Request $request)
    {

        $photoId = $this->userService->resetPassword($request);

        return redirect()->back();
    }



    public function destroy(Request $request)
    {
        $result = $this->userService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công thành công tài khoản'
            ]);
        }

        return response()->json(['error' => true]);
    }

    public function show()
    {
        return view('admin.users.show', [
            'title' => 'Thông tin cá nhân',
            'data' => Auth::user()
        ]);
    }

    public function edit(Request $request)
    {
        $result = $this->userService->update($request);

        return redirect()->back();
    }
}
