<?php

namespace Database\Seeders;

use App\Http\Enums\RoleEnum;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                "name" => RoleEnum::SuperAdmin->value
            ],
            [
                "name" => RoleEnum::Admin->value
            ],
            [
                "name" => RoleEnum::Guess->value
            ],
        ];

        Role::insert($roles);
    }
}
