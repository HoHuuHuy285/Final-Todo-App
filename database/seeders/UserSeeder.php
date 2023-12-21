<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public $users = [
        [
            'id' => 1,
            'name' => 'Huy',
            'email' => 'huy.ho2102152@vnuk.edu.vn',
            'password' => '14121412',
        ],
        [
            'id' => 2,
            'name' => 'B',
            'email' => '123@gmail.com',
            'password' => '123456',
        ],
    ];

    private function getUsers()
    {
        return $this->users;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->getUsers() as $user) {
            User::create($user);
        }
    }
}
