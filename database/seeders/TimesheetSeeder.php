<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Timesheet;

class TimesheetSeeder extends Seeder
{
    public function run()
    {
        Timesheet::factory()
            ->count(100)
            ->create()
            ->each(function ($timesheet) {
                // Remove timesheet if user_id or contract_id is null
                if (is_null($timesheet->user_id) || is_null($timesheet->contract_id)) {
                    $timesheet->delete();
                }
            });
    }
}
