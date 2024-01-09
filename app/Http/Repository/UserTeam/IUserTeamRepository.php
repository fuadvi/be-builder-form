<?php

namespace App\Http\Repository\UserTeam;

use App\Models\UserTeam;

interface IUserTeamRepository
{
    public function create(array $data): UserTeam;
}
