<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Contract;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContractFactory extends Factory
{
    protected $model = Contract::class;

    public function definition()
    {
        return [
            'client_id' => Client::factory(),
            'user_id' => User::factory(),
            'manager_id' => User::factory()->state(['role' => 'manager']),
            'contract_title' => $this->faker->sentence,
            'invoicing_required' => $this->faker->boolean,
            'invoicing_scheduler' => $this->faker->word,
            'purchase_order' => $this->faker->word,
            'contract_start_date' => $this->faker->date,
            'contract_end_date' => $this->faker->date,
            'timesheet_frequency' => $this->faker->randomElement(['weekly', 'fortnightly', 'monthly']),
            'timesheet_approved_by' => $this->faker->name,
            'place_of_employment' => $this->faker->address,
            'jurisdiction' => $this->faker->address,
            'position_description' => $this->faker->paragraph,
            'award' => $this->faker->word,
            'insurance_details' => $this->faker->sentence,
            'contract_conditions' => $this->faker->paragraph,
            'total_contract_units' => $this->faker->numberBetween(1, 100),
            'rate_name' => $this->faker->word,
            'unit_of_pay' => $this->faker->numberBetween(1, 100),
            'pay_schedule' => $this->faker->randomElement(['weekly', 'fortnightly', 'monthly']),
            'generate_sales_invoice' => $this->faker->boolean,
            'contract_template' => $this->faker->word,
            'standard_hours_of_pay' => $this->faker->numberBetween(1, 40),
            'standard_hours_in_a_day' => $this->faker->numberBetween(1, 16),
            'pay_amount' => $this->faker->randomFloat(2, 1000, 10000),
            'charge_amount' => $this->faker->randomFloat(2, 2000, 20000),
            'contract_status' => $this->faker->boolean,
            'additional_clause' => $this->faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
