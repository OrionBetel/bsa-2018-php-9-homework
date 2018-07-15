<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CurrenciesSeeder::class);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@curmarket.com',
            'password' => Hash::make('sesame'),
            'is_admin' => true,
        ]);
    }
}
