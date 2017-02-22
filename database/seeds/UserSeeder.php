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
        User::create([
        	'email' => 'superadmin@salesandaftersales.com',
        	'name' => 'Super Admin',
        	'password' => 'sup3r@dm1n',
        	'verified' => true
    	]);
    }
}
