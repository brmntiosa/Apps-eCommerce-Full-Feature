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
    public function editUser($id)
    {
        $user = User::find($id);

        return view('site.admin.edit', ['user' => $user]);
    }

    public function addUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required',

        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,

        ]);

        return redirect()->route('getIndex.users')->with('success', 'Pengguna berhasil ditambahkan');
    }
    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->wishlist()->detach();

            $user->oneTimePasswords()->delete();

            $user->delete();

            return redirect()->route('getIndex.users')->with('success', 'User deleted successfully');
        } else {
            return redirect()->route('getIndex.users')->with('error', 'User not found');
        }
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('getIndex.users')->with('success', 'User updated successfully');
    }
}
