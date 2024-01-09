<?php

namespace App\Http\Repository\UserTeam;

use App\Http\Repository\UserTeam\IUserTeamRepository;
use App\Models\UserTeam;
use Illuminate\Support\Facades\DB;

class UserTeamRepository implements IUserTeamRepository
{
    public function __construct(
        private UserTeam $userTeam
    )
    {
    }


    public function create(array $data): UserTeam
    {
        try {
            DB::beginTransaction();

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

    public function addPeople(UserTeam $userTeam,array $peoples)
    {
        collect($peoples)->each(fn($people) => $userTeam->member()->create($people));
    }


}
