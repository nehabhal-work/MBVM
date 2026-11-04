<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Default login accounts.
     * Passwords are managed only from here — change the value below and re-run:
     *   php artisan db:seed --class=UserSeeder
     */
    public function run(): void
    {
        $users = [
            [
                'name'     => 'Admin',
                'email'    => 'admin@mbvm.in',
                'password' => 'password',
                'role'     => 'admin',
            ],
            [
                'name'     => 'User',
                'email'    => 'user@mbvm.in',
                'password' => 'password',
                'role'     => 'user',
            ],
        ];

        foreach ($users as $data) {
            User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'name'              => $data['name'],
                    'password'          => $data['password'], // hashed by the model's 'hashed' cast
                    'role'              => $data['role'],
                    'email_verified_at' => now(),
                ]
            );
        }
    }
}
