<?php

namespace App\Http\Repository\UserTeam;

use App\Http\Repository\UserTeam\IUserTeamRepository;
use App\Models\UserTeam;

class UserTeamRepository implements IUserTeamRepository
{
    public function __construct(
        private UserTeam $userTeam
    )
    {
    }


    public function create(array $data): UserTeam
    {
        return $this->userTeam->create($data);
    }
}
