<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Customer Service CB1',
            'email' => 'cs1@bank.dki',
            'password' => Hash::make('12345678'),
            'role' => 'cs',
        ]);

        User::create([
            'name' => 'Supervisi CB1',
            'email' => 'supervisi1@bank.dki',
            'password' => Hash::make('12345678'),
            'role' => 'supervisi',
        ]);

        User::create([
            'name' => 'Customer Service CB2',
            'email' => 'cs2@bank.dki',
            'password' => Hash::make('12345678'),
            'role' => 'cs',
        ]);

        User::create([
            'name' => 'Supervisi CB2',
            'email' => 'supervisi2@bank.dki',
            'password' => Hash::make('12345678'),
            'role' => 'supervisi',
        ]);
    }
}
