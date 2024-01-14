<?php

namespace App\Http\Repository\UserTeam;

use App\Models\Team;

interface IUserTeamRepository
{
    public function create(array $data): Team;

    public function addPeople(Team $userTeam, array $peoples);
    public function removeMember(Team $userTeam, $userId);
}
