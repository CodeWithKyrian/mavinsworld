<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'firstname' => "Lawrence",
            'lastname' => 'Onyia',
            'email' => 'admin@admin.com',
            'phone' => '09076463437',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'is_admin' => true
        ]);

        User::factory(10)->has(Address::factory())->create();
    }

}
