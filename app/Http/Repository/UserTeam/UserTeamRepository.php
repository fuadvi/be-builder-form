<?php

namespace App\Http\Repository\UserTeam;

use App\Http\Repository\UserTeam\IUserTeamRepository;
use App\Models\Team;
use Illuminate\Support\Facades\DB;

class UserTeamRepository implements IUserTeamRepository
{
    public function __construct(
        private Team $userTeam
    )
    {
    }


    public function create(array $data): Team
    {
        try {
            DB::beginTransaction();

            $data['user_id'] = auth()->user()->id;
            $team = $this->userTeam->create($data);

            $team->member()->create([
                'user_id' => auth()->user()->id
            ]);

            DB::commit();
        } catch (\Exception $err)
        {
            DB::rollBack();

            throw $err;
        }

        return $team;
    }

    public function addPeople(Team $userTeam, array $peoples)
    {
        collect($peoples['member'])->each(fn($people) => $userTeam->member()->create([
            'user_id' => $people
        ]));
    }

    public function removeMember(Team $userTeam, $userId): bool
    {
        if ($userTeam->user_id !== $userId) return false;

       return $userTeam->member->whereUserId($userId)->delete();
    }

}
