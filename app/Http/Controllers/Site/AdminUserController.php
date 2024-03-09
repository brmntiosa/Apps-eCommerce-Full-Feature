<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('site.admin.user', ['users' => $users]);
    }
    // app/Http/Controllers/Site/AdminController.php
    public function editUser($id)
    {
        $user = User::find($id);

        return view('site.admin.edit', ['user' => $user]);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('site.admin.getIndex')->with('success', 'User deleted successfully');
    }

    public function updateUser(Request $request, $id)
{
    $user = User::find($id);
    $user->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
    ]);

    return redirect()->route('site.admin.getIndex')->with('success', 'User updated successfully');
}
}
