<?php

namespace App\Http\Controllers\Shared;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:' . User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($validator->fails()) {
            return response([
                'success' => false,
                'errors' => $validator->errors(),
                'message' => 'Registration failed. Please check your input.',
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $role = Role::where('name', 'user')->first();
        $user->assignRole($role);
        event(new Registered($user));
        Auth::login($user);
        $responseData = [
            'token' => $user->createToken($user->name)->plainTextToken,
            'name' => $user->name,
        ];
        $successResponse = [
            'success' => true,
            'data' => $responseData,
            'message' => 'User successfully registered.',
        ];

        return response($successResponse);
    }

    public function getUser(Request $request)
    {
        return response()->json([
            'success' => true,
            'data' => $request->user()
        ], 200);
    }

    public function logout(Request $request)
    {
        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Periksa apakah pengguna memiliki token
        if ($user->tokens->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No active tokens found for this user.',
            ], 404);
        }

        // Hapus semua token yang terkait dengan pengguna
        $user->tokens->each(function ($token) {
            $token->delete();
        });

        // Kirim respons sukses
        return response()->json([
            'success' => true,
            'message' => 'Successfully logged out.',
        ], 200);
    }

    public function login(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors occurred.',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Verifikasi kredensial
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            /** @var \App\Models\User $user */
            $user = Auth::user();
            $responseData = [
                'token' => $user->createToken($user->name)->plainTextToken,
                'name' => $user->name,
            ];

            // Kirim respons sukses
            return response()->json([
                'success' => true,
                'message' => 'Login successful.',
                'data' => $responseData,
            ], 200);
        }

        // Kredensial salah
        return response()->json([
            'success' => false,
            'message' => 'Invalid credentials.',
        ], 401);
    }

    public function updateUser(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|confirmed|min:8',
        ]);

        try {
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];

            if (!empty($validatedData['password'])) {
                $user->password = Hash::make($validatedData['password']);
            }

            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'User updated successfully.',
                'data' => $user,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update user: ' . $e->getMessage(),
            ], 500);
        }
    }
}
