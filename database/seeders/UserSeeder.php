<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'nom' => "Kane",
                'prenom' => "Samba Berry",
                'email' => "sambaBerry@gmail.com",
                "role" => "admin",
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],

            [
                'nom' => "Talla",
                'prenom' => "Cheikh Saliou",
                'email' => "cheikhSaliou@gmail.com",
                "role" => "admin",
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'nom' => "Diallo",
                'prenom' => "Alpha",
                'email' => "alpha@gmail.com",
                "role" => "admin",
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]
        
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
