<?php

namespace App\Http\Controllers;

use App\Http\Repository\UserTeam\IUserTeamRepository;
use App\Http\Requests\CreateTeamRequest;
use App\Http\Traits\ResponFormater;

class UserTeamController extends Controller
{
    use ResponFormater;

    public function __construct(
        protected readonly IUserTeamRepository $userTeamRepo,
    )
    {
    }

    public function createTeam(CreateTeamRequest $request)
    {
        $team = $this->userTeamRepo->create($request->validated());
        return $this->success(__('team.create'),$team);
    }

}
