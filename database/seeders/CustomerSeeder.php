<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()->create([
            'name' => 'Antek',
            'surname' => 'Kowalski',
            'phone' => '123456789'
        ]);
    }
}
