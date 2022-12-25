<?php

namespace Database\Seeders;

use App\Models\Domains;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $domains = [
            [
                'name' => 'Nguyễn Văn Domain A',
                'domain_name' => 'domaina.vn',
                'address' => '72 Văn Cao, TP Hồ Chí Minh',
                'domain_init_id' => 3,
                'note' => "My note domain a",
                'price' => 300000,
                'price_special' => 299000,
                'date_payment' => Carbon::now(),
                'duration_id' => 4,
                'status_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Nguyễn Văn Domain B',
                'domain_name' => 'domainb.vn',
                'address' => '72 Văn Cao, TP Hồ Chí Minh',
                'domain_init_id' => 2,
                'note' => "My note domain b",
                'price' => 300000,
                'price_special' => 299000,
                'date_payment' => Carbon::now(),
                'duration_id' => 2,
                'status_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Nguyễn Văn Domain C',
                'domain_name' => 'domainc.vn',
                'address' => '72 Văn Cao, TP Hồ Chí Minh',
                'domain_init_id' => 1,
                'note' => "My note domain c",
                'price' => 300000,
                'price_special' => 299000,
                'date_payment' => Carbon::now(),
                'duration_id' => 3,
                'status_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Nguyễn Văn Domain D',
                'domain_name' => 'domaind.vn',
                'address' => '72 Văn Cao, TP Hồ Chí Minh',
                'domain_init_id' => 1,
                'note' => "My note domain d",
                'price' => 300000,
                'price_special' => 299000,
                'date_payment' => Carbon::now(),
                'duration_id' => 3,
                'status_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];
        foreach ($domains as $key => $item) {
            Domains::create($item);
        }
    }
}
