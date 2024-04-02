<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(UserRegisterRequest $request): JsonResponse{
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

        $user = new User($data);
        $user->password = Hash::make($data['password']);
        $user->save();

        return (new UserResource($user))->response()->setStatusCode(201);
    }

}
