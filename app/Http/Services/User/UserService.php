<?php


namespace App\Http\Services\User;


use App\Models\Image_Products;
use App\Models\Menu;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserService
{

    const LIMIT = 10;

    public function getList()
    {
        return User::orderByDesc('id')->paginate(10);
    }

    public function insert($request)
    {
        try {
            $request->except('_token');

            $id = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ])->id;




            Session::flash('success', 'Thêm tài khoản thành công');
            return true;
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return false;
    }

    public function resetPassword($request)
    {
        try {
            User::where('id', $request->input('id'))->update(['password' => bcrypt('123456')]);

            Session::flash('success', 'Reset mật khẩu về 123456');
            return true;
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return false;
    }



    public function delete($request)
    {

        $post = User::where('id', $request->input('id'))->first();
        if ($post) {

            $post->delete();
            return true;
        }

        return false;
    }

    public function update($request)
    {
        try {
            #$request->except('_token');

            if (strlen(trim($request->input('newexp'))) > 0) {
                User::where('id', $request->input('id'))->update([
                    'name' => (string) $request->input('name'),
                    'email' => (string) $request->input('email'),
                    'password' => bcrypt($request->input('newexp'))
                ]);

                Session::flash('success', 'Đổi password thành công');
            } else {
                User::where('id', $request->input('id'))->update([
                    'name' => (string) $request->input('name'),
                    'email' => (string) $request->input('email')
                ]);

                Session::flash('success', 'Đổi thông tin thành công');
            }
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }
}
