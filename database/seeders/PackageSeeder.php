<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Packages;
use Carbon\Carbon;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = [
            [
                'name' => 'Package 0.5GB',
                'gb' => 0.5 * 1024,
                'ram' => 0.5 * 1024,
                'price' => 800000,
                'price_special' => 700000,
                'status_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Package 1GB',
                'gb' => 1 * 1024,
                'ram' => 1 * 1024,
                'price' => 1700000,
                'price_special' => 1500000,
                'status_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Package 2GB',
                'gb' => 2 * 1024,
                'ram' => 2 * 1024,
                'price' => 1329000,
                'price_special' => 1129000,
                'status_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Package 3GB',
                'gb' => 3 * 1024,
                'ram' => 3 * 1024,
                'price' => 1329000,
                'price_special' => 1129000,
                'status_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Package 4GB',
                'gb' => 4 * 1024,
                'ram' => 4 * 1024,
                'price' => 1329000,
                'price_special' => 1129000,
                'status_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Package 5GB',
                'gb' => 5 * 1024,
                'ram' => 5 * 1024,
                'price' => 9990000,
                'price_special' => 8880000,
                'status_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Package 10GB',
                'gb' => 10 * 1024,
                'ram' => 10 * 1024,
                'price' => 9990000,
                'price_special' => 8880000,
                'status_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Package 15GB',
                'gb' => 15 * 1024,
                'ram' => 15 * 1024,
                'price' => 9990000,
                'price_special' => 8880000,
                'status_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        foreach ($packages as $key => $item) {
            Packages::create($item);
        }
    }
}
