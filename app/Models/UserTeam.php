<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTeam extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function member()
    {
        return $this->hasMany(TeamUser::class);
    }
}
