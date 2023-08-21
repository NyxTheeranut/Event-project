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
//         User::factory(10)->create();
//
//
//         User::factory()->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//         ]);



        //edit git

        if (User::count() > 0) {
            return;
        }

        $user = new User();
        $user->firstname = 'หมิวหมิว';
        $user->lastname = 'หมิวหมิว';
        $user->nickname = 'หมิว';
        $user->email = 'mute@example.com';
        $user->password = Hash::make("mute");
        $user->birthdate = fake()->dateTime();
        $user->role = User::ROLE_MEMBER;
        $user->profilepicture_path = ""
        $user->save();

        $user = new User();
        $user->firstname = 'นาย สามารถ';
        $user->lastname = 'สมาร์ทสมาร์ท';
        $user->nickname = 'สมาร์ท';
        $user->email = 'smart@example.com';
        $user->password = Hash::make("smart");
        $user->birthdate = fake()->dateTime();
        $user->role = User::ROLE_STAFF;
        $user->save();

        $user = new User();
        $user->firstname = 'รสริน';
        $user->lastname = 'รสริน';
        $user->nickname = 'รสริน';
        $user->email = 'roserin@example.com';
        $user->password = Hash::make("roserin");
        $user->birthdate = fake()->dateTime();
        $user->role = User::ROLE_ACCOUNTANT;
        $user->save();

    }
}
