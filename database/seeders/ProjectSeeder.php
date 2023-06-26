<?php

namespace Database\Seeders;


use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $data = [
                'title' => 'Test prueba',
                'user_id' => 1,
                'description' => 'Test prueba descripcion',
                'date_start' => '2023/05/06',
                'date_end' => '2023/06/06',
            ];
            DB::table('projects')->insert($data);
    }
}
