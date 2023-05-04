<?php

namespace Database\Seeders;

use App\Models\User;
// use App\Http\Controllers\user;
use App\Models\User as ModelsUser;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'divisi_id' => 1,
            'lokasi_id' => 1,
            'password' => bcrypt('1'),
        ]);
        $admin->assignRole('admin');

        $IT = User::create([
            'name' => 'IT',
            'email' => 'IT@gmail.com',
            'username' => 'IT',
            'divisi_id' => 1,
            'lokasi_id' => 1,
            'password' => bcrypt('1234'),
            // 'password_plain' => 1234
        ]);
        $IT->assignRole('admin');

        $user = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'username' => 'user',
            'divisi_id' => 1,
            'lokasi_id' => 1,
            'password' => bcrypt('1'),
        ]);
        $user->assignRole('user');
    }
}