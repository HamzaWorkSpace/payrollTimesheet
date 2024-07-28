<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contract;
use App\Models\Client;
use App\Models\User;

class ContractSeeder extends Seeder
{
    public function run()
    {
        // Retrieve all clients and users
        $clients = Client::all();
        $users = User::all();

        // Create contracts and assign them to users and clients
        Contract::factory()
            ->count(20)
            ->make()
            ->each(function ($contract) use ($clients, $users) {
                $contract->client_id = $clients->random()->id;
                $contract->user_id = $users->random()->id;
                $contract->manager_id = $users->where('role', 'manager')->random()->id;
                $contract->save();
            });
    }
}
