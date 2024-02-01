<?php

namespace App\Http\Controllers;

use App\Http\Repository\UserTeam\IUserTeamRepository;
use App\Http\Requests\AddPeopleTeam;
use App\Http\Requests\CreateTeamRequest;
use App\Http\Traits\ResponFormater;
use App\Models\Team;

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
        return $this->success(__('team.success',['message' => 'Membuat Team']),$team);
    }

    public function addPeople(Team $team, AddPeopleTeam $request)
    {
        $this->userTeamRepo->addPeople($team,$request->validated());
        return $this->success(__('team.success',['message' => 'Menambahkan Member']),null);
    }

    public function removeMember(Team $team, $userId)
    {
       if (!$this->userTeamRepo->removeMember($team,$userId))
           throw new \Exception("Tidak Memiliki Akses Hapus Member",400);

       return $this->success(__('team.success',['message' => 'Mengahpus Member']),null);
    }

    

}
