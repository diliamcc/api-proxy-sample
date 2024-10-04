<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $username = config('app.default_seeders.username');
        $password = config('app.default_seeders.password');

        if (empty($username) || empty($password)) {
            throw new \Exception('You must provide the username and password through your config file.');
        }

        User::create([
            'name' => 'Test User',
            'username' => $username,
            'password' => Hash::make($password),
            'email_verified_at' => now(),
            // Replacing non alphanumeric values
            'email' => preg_replace('#\W#', '', $username) . '@gmail.com',
        ]);
    }
}
