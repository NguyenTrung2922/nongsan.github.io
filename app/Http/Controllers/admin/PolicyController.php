<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Policy\PolicyService;
use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    protected $policyService;
    public function __construct(PolicyService $policyService)
    {
        $this->policyService = $policyService;
    }
    public function create()
    {

        return view('admin.policy.add', [
            'title' => 'Tạo mới chính sách'
        ]);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $this->policyService->create($request);
        return redirect()->back();
    }

    public function index()
    {
        return view('admin.policy.list', [
            'title' => 'Danh sách chính sách',
            'policys' => $this->policyService->getAll()
        ]);
    }

    public function show(Policy $policy)
    {


        return view('admin.policy.edit', [
            'title' => 'Chỉnh sửa chính sách',
            'policy' => $policy
        ]);
    }

    public function update(Policy $policy, Request $request)
    {
        // dd($request->all());
        $this->policyService->update($policy, $request);
        return redirect('/admin/policys/list');
    }

    public function destroy(Request $request)
    {
        $result = $this->policyService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công chính sách'
            ]);
        }

        return response()->json(['error' => true]);
    }
}
