<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(UserRegisterRequest $request): UserResource{
        //memanggil data yang dibuat dengan memvalidasi
        $data = $request->validated();

        // Periksa apakah email sudah ada di database
        if (User::where('email', $data['email'])->exists()) {
            // Handle jika email sudah ada
        }

        $user = new User($data);
        $user->password = Hash::make($data['password']);
        $user->save();

        return new UserResource($user);
    }

}
