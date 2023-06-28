<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Super Admin',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Admin',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Author',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Editor',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'User',
                'created_at' => Carbon::now(),
            ],
        ];

        foreach($roles as $role) {
            DB::table('roles')->insert($role);
        }
    }
}
