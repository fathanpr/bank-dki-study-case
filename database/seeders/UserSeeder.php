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
            'name' => 'Customer Service',
            'email' => 'cs@bank.dki',
            'password' => Hash::make('12345678'),
            'role' => 'cs',
        ]);

        User::create([
            'name' => 'Supervisi',
            'email' => 'supervisi@bank.dki',
            'password' => Hash::make('12345678'),
            'role' => 'supervisi',
        ]);
    }
}
