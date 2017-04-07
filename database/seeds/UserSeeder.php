<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!User::where('email', 'superadmin@salesandaftersales.com')->first()){
            User::create([
                'email' => 'superadmin@salesandaftersales.com',
                'name' => 'Super Admin',
                'password' => 'sup3r@dm1n',
                'verified' => true
            ]);
        }
    }
}
