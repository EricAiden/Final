<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        return view('frontend.users.profile');
    }

    public function updateUserDetails(Request $request)

    {
        $request->validate([

            'username' => ['required', 'string'],
            'phone' => ['required', 'digits:10'],
            'pin_code' => ['required', 'digits:6'],
            'address' => ['required', 'string', 'max:499'],

        ]);

        $user = user::findOrFail(Auth::user()->id);
        $user->update([
            'name' => $request->username
        ]);

        $user->userDetail()->updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'phone' => $request->phone,
                'pin_code' => $request->pin_code,
                'address' => $request->address,
            ]
        );

        return redirect()->back()->with('message', 'User Profile Update');
    }

    public function passwordCreate()
    {
        return view('frontend.users.change-password');
        // hiển thị kết quả trả về ở trang change-pasword.blade.php được tạo
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
        // dòng 63 nó sẽ kiểm tra mật khẩu cũ mà bạn nhập vào có đúng không
        if ($currentPasswordStatus) {
            // nếu mật khẩu cũ nhập đúng thì nó sẽ cho cập nhật pas mới
            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('message', 'Password Updated Successfully');
        } else {
            // và ngược lại thì ở dòng dưới dịch ra là mật khẩu hiện tại ko khớp vs mật khẩu cũ 
            return redirect()->back()->with('message', 'Current Password does not match with Old Password');
        }
    }
}
