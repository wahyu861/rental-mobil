<?php

namespace App\Http\Controllers\Back;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('back.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('back.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8', // Pastikan untuk menambahkan validasi konfirmasi dan minimal karakter
            'roles' => 'required|in:admin,user', // Validasi role harus admin atau user
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Menetapkan role kepada pengguna
        $user->assignRole($request->roles);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all(); // Ambil semua roles
        return view('back.users.edit', compact('user', 'roles'));
    }

    public function editUser()
    {
        $user = Auth::user();
        return view('back.users.edit_user', compact('user'));
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

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|confirmed|min:8', // Password boleh kosong
            'roles' => 'required|in:admin,user',
        ]);

        // Update nama dan email
        $user->name = $request->name;
        $user->email = $request->email;

        // Jika password diisi, update password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Simpan perubahan ke database
        $user->save();

        // Menetapkan role kepada pengguna
        $user->syncRoles($request->roles);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete(); // Hapus pengguna

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
