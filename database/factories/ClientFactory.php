<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    protected $model = Client::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'ABN' => $this->faker->randomNumber(9, true),
            'contract_name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'Xero_contact_id' => $this->faker->uuid,
            'invoice_date_type' => 'monthly',
            'payment_terms' => $this->faker->numberBetween(1, 90),
            'invoicing' => $this->faker->boolean,
            'merge_attachments_as_zip' => $this->faker->boolean,
            'auto_upload_attachments_to_xero' => $this->faker->boolean,
            'notes' => $this->faker->sentence,
            'active' => $this->faker->boolean,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
