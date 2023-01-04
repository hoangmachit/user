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
            'page_contract' => 2,
            'page_customer' => 2,
            'page_design' => 2,
            'page_domain' => 2
        ];
        Settings::create($setting);
    }
}
