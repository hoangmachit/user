<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            DurationsSeeder::class,
            StatusSeeder::class,
            PackageSeeder::class,
            DomainInitSeeder::class,
            CancelsSeeder::class,
            SettingSeeder::class,
            // DesignSeeder::class,
            // DomainSeeder::class,
            // CustomerSeeder::class,
            // ContractSeeder::class
        ]);
    }
}
