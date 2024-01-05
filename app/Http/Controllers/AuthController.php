<?php

namespace App\Http\Controllers;

use App\Http\Repository\User\IUserRepository;
use App\Http\Requests\RegisterRequest;
use App\Http\Traits\ResponFormater;
use Illuminate\Http\Request;

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

}
