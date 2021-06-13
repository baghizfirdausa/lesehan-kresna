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
            'name' => "Annesia Putri Kinanti",
            'username' => "keuangan",
            'role' => "keuangan",
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => "Ninis Triaswati",
            'username' => "pemilik",
            'role' => "pemilik",
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => "Nina Andiraita",
            'username' => "kasir",
            'role' => "kasir",
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
    }
}
