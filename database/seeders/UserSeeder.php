<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        $user = new User();
        $user->firstname = 'หมิวหมิว';
        $user->lastname = 'หมิวหมิว';
        $user->nickname = 'หมิว';
        $user->email = 'mute@example.com';
        $user->password = "mute";
        $user->save();

        $user = new User();
        $user->firstname = 'นาย สามารถ';
        $user->lastname = 'สมาร์ทสมาร์ท';
        $user->nickname = 'สมาร์ท';
        $user->email = 'smart@example.com';
        $user->password = "smart";
        $user->save();

        $user = new User();
        $user->firstname = 'รสริน';
        $user->lastname = 'รสริน';
        $user->nickname = 'รสริน';
        $user->email = 'roserin@example.com';
        $user->password = "roserin";
        $user->save();

    }
}
