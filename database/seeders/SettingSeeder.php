<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Settings;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = [
            'title' => 'Haweb.vn',
            'description' => 'Haweb.vn',
            'keyword' => 'Haweb.vn',
            'page_contract' => 10,
            'page_customer' => 10,
            'page_design' => 10,
            'page_domain' => 10
        ];
        Settings::create($setting);
    }
}
