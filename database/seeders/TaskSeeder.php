<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\Company;
use App\Models\Project;
use App\Models\Staff;

class TaskSeeder extends Seeder
{
    public function run()
    {
        // Fetch first company, project, and staff
        $company = Company::first();
        $project = Project::first();
        $staff = Staff::first();

        // Check if data exists before inserting
        if ($company && $project && $staff) {
            Task::create([
                'task_name' => 'Website Development',
                'company_id' => $company->id,
                'project_id' => $project->id,
                'staff_id' => $staff->id,
                'remark' => 'Develop a new company website',
            ]);

            Task::create([
                'task_name' => 'App Testing',
                'company_id' => $company->id,
                'project_id' => $project->id,
                'staff_id' => $staff->id,
                'remark' => 'Test the mobile application for bugs',
            ]);
        }
    }
}
