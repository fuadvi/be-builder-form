<?php

namespace App\Http\Repository\User;

use App\Models\User;

interface IUserRepository
{
    public function addUser(array $data): User;

    public function getByEmail(string $email): User;
}
