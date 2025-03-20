<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{


    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('projects')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        DB::table('projects')->insert([
            [
                'company_id' => 1,
                'staff_id' => 1,
                'project_name' => 'First Test Project',
            ],
            [
                'company_id' => 2,
                'staff_id' => 2,
                'project_name' => 'Second Test Project',
            ],
        ]);
    }
}
