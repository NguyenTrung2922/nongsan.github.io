<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Message\MessageService;
use App\Models\Category;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    protected $messageService;
    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }
    public function weblienhe()
    {

        $category = Category::where('parent_id', 0)->get();
        return view('Web.message.view', [
            'category' => $category
        ]);
    }


    public function guitinnhan(Request $request)
    {

        $this->messageService->insert($request);
        return redirect()->back();
    }

    public function index()
    {
        return view('admin.message.list', [
            'title' => 'Danh sách phản hồi',
            'message' => $this->messageService->get()
        ]);
    }

    public function show(Message $message)
    {
        return view('admin.message.view', [
            'title' => 'Nội dung phản hồi',
            'data' => $message
        ]);
    }

    public function destroy(Request $request)
    {
        $result = $this->messageService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công'
            ]);
        }

        return response()->json(['error' => true]);
    }
}
