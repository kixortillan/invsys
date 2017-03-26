<?php

use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Utilities\Currency::create([
            'code' => 'PHP', 'country' => 'Philippines'
        ]);

        \App\Models\Utilities\Currency::create([
            'code' => 'USD', 'country' => 'USA'
        ]);
    }
}
