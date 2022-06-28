<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::updateOrCreate([
            'id' => 1,
            'street' => '',
            'house_number' => '',
            'house_number_suffix' => null,
            'zip_code' => '',
            'city' => '',
            'user_id' => ''
        ]);
    }
}
