<?php

namespace Database\Factories;

use App\Models\Contract;
use App\Models\Timesheet;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class TimesheetFactory extends Factory
{
    protected $model = Timesheet::class;

    public function definition()
    {
        // Generate a random date within the last 2 years
        $startDate = Carbon::now()->subYears(2)->startOfWeek()->addWeeks($this->faker->numberBetween(0, 104));
        $endDate = $startDate->copy()->endOfWeek();

        // Get a user who has a contract assigned
        $user = User::whereHas('contracts')->inRandomOrder()->first();

        // Get a contract assigned to the user
        $contract = $user ? $user->contracts()->inRandomOrder()->first() : null;

        return [
            'user_id' => $user ? $user->id : null,
            'contract_id' => $contract ? $contract->id : null,
            'client_id' => $contract ? $contract->client_id : null,
            'timesheet_start' => $startDate->format('Y-m-d'),
            'timesheet_end' => $endDate->format('Y-m-d'),
            'status' => $this->faker->randomElement(['approved', 'pending', 'rejected']),
            'total_unit' => $this->faker->numberBetween(1, 100),
        ];
    }
}
