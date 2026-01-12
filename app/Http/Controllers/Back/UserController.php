<?php

namespace App\Http\Controllers\Back;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('back.users.index');
    }

    public function editUser()
    {
        $user = Auth::user();

        return view('back.users.edit-user', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email' . $user->id,
            'password' => 'nullable|string|confirmed|min:8'
        ]);

        // Update nama dan email
        $user->name = $request->name;
        $user->email = $request->email;

        // Jika password diisi, update password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('edit.profile')->with('success', 'User update successfully.');
    }
}
