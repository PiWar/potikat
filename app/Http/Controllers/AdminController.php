<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    public function login(AdminLoginRequest $request)
    {
        $credentials = $request->validated();
        if(auth()->attempt($credentials)){
            $token = auth()->user()->createToken("token")->plainTextToken;
            return resJson(
                "successful login",
                ["token" => $token],
                Response::HTTP_OK
            );
        }
        return resJson(
            "failed auth",
            ["errors" => ["message" => "invalid credentials"]],
            Response::HTTP_NOT_FOUND,
        );
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        session()->flush();
        return resJson(
            "successful logout",
            [],
            Response::HTTP_OK
        );
    }
}
