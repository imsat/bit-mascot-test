<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserInfo;
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
        $admin = User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => null,
            'is_admin' => true,
            'email' => 'admin@localhost.local',
            'password' => Hash::make('admin')
        ]);

        UserInfo::factory()->create([
            'user_id' => $admin->id
        ]);

        User::factory(200)->create()->each(function ($user) {
            UserInfo::factory()->create([
                'user_id' => $user->id
            ]);
        });
    }
}
