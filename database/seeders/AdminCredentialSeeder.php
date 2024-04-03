<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminCredentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();

        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make(123456),
                'type' => UserType::Admin->value
            ],
            [
                'name' => 'Subscriber 1',
                'email' => 'subscriber@mail.com',
                'password' => Hash::make(123456),
                'type' => UserType::Subscriber->value
            ],
            [
                'name' => 'Subscriber 2',
                'email' => 'subscriber2@mail.com',
                'password' => Hash::make(123456),
                'type' => UserType::Subscriber->value
            ],
        ];


        foreach ($users as $user){
            User::create($user);
        }

    }
}
