<?php

namespace App\Http\Controllers;

use App\Http\Repository\User\IUserRepository;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Traits\ResponFormater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ResponFormater;

    public function __construct(
        protected readonly IUserRepository $userRepo,
    )
    {
    }


    public function reqister(RegisterRequest $request)
    {
        $user = $this->userRepo->addUser($request->validated());

        return $this->success(__('auth.success',['message' =>"Mendaftar Akun"]), $user);
    }

    public function login(LoginRequest $request)
    {

        $user = $this->userRepo->getByEmail($request->email);

        if (!$user|| !Hash::check($request->password,$user->password))
            return $this->error(__('auth.unauthorized'),400);

       $token = $user->createToken('token')->plainTextToken;

       $response = [
           "token" => $token,
           "user" => (object)[
               "name" => $user->name
           ]
       ];

        return $this->success(__('auth.success',['message' =>"Mendaftar Akun"]), $response);
    }

}
