<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Mạch Văn Hoàng',
                'email' => 'hoangmach.website@gmail.com',
                'password' => Hash::make('admin#123'),
            ],
            [
                'name' => 'Nguyễn Bá Chương',
                'email' => 'chuong.mass@gmail.com',
                'password' => Hash::make('admin#123'),
            ]
        ];
        foreach ($users as $key => $item) {
            User::create($item);
        }
    }
}
