<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagerController extends Controller
{
    public function ViewUser() {
        $users = User::where('role', '<>', '1')->get();
        return view('dashboard.view-user', compact('users'));
    }

    public function DeleteUser($id) {
        $user = User::find($id);
        $user->delete();
        return back();
    }
}
