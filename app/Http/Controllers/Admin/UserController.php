<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function destroy($user_id)
    {
        $user = User::find($user_id);

        $user->delete();

        return redirect('admin/users')->with('message', 'Account User Deleted Successfully');
    }
}