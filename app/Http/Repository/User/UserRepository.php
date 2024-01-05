<?php

namespace App\Http\Repository\User;

use App\Http\Repository\User\IUserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements IUserRepository
{
    public function __construct(
        private User $user
    )
    {
    }


    public function addUser(array $data): User
    {
        $data['password'] = Hash::make($data['password']);
       return $this->user->create($data);
    }
}
