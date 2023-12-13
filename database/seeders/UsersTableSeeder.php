<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'names' => 'Melany',
                'email' => 'mkcaicedo@espe.edu.ec',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'identification_card'=> '2350769275',
                'last_names'=> 'Caicedo', 
                'phone' => '0967749844',
                'blood_type' => 'B+',
                'is_admin'=> true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'names' => 'Bryan',
                'email' => 'bscruz@espe.edu.ec',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'identification_card'=> '1718324765',
                'last_names'=> 'Cruz', 
                'phone' => '0959113863',
                'blood_type' => 'A+',
                'is_admin'=> true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'names' => 'Leonardo',
                'email' => 'ldflores9@espe.edu.ec',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'identification_card'=> '1755605688',
                'last_names'=> 'Flores', 
                'phone' => '0969734638',
                'blood_type' => 'A+',
                'is_admin'=> true,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        foreach ($users as $user)
            User::create($user);
    }
}
