<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(UserRegisterRequest $request): JsonResponse
    {
        //memanggil data yang dibuat dengan memvalidasi
        $data = $request->validated();

        // Periksa apakah email sudah ada di database
        if (User::where('email', $data['email'])->count() == 1 ) {
            throw new HttpResponseException(response([
                "errors"=>[
                    'email'=>[
                        'email alraidy registered'
                    ]
                ]
            ], 400));
        }
        //melakukan register
        $user = new User($data);
        $user->password = Hash::make($data['password']);
        $user->save();

        return (new UserResource($user))->response()->setStatusCode(201);
    }

    public function Login(UserLoginRequest $request): JsonResponse
    {
        $data = $request->validated();

        //memanggil data dari database
        $user = User::where('email', $data['email'])->first();

        //jika data tidak ada didatabase atau password tidak valid
        if(!$user || !Hash::check($data['password'], $user->password)){
            throw new HttpResponseException(response([
                "errors" => [
                    "message"=>[
                        "email and password not valid"
                    ]
                ]
            ], 401));
        }

        //membuat token pada Login secara Unique
        $user->token = Str::uuid()->toString();
        $user->save();

        return response()->json(new UserResource($user));
    }

    public function logout(Request $request): JsonResponse{
        $user = Auth::user();

        // Memastikan ada user yang sedang login sebelum menghapus token
        if ($user) {
            $user->tokens->each(function ($token, $key) {
                $token->delete();
            });
        }
    
        return response()->json([
            "data" => true
        ])->setStatusCode(200);;
    }


}

