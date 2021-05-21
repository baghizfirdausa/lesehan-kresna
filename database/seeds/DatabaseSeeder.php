<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Keuangan",
            'username' => "keuangan",
            'role' => "keuangan",
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => "Pemilik",
            'username' => "pemilik",
            'role' => "pemilik",
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => "Kasir",
            'username' => "kasir",
            'role' => "kasir",
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
    }
}
