<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Durations;
use SebastianBergmann\Timer\Duration;

class DurationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $durations = [
            [
                'name' => '1 Year',
                'year' => 1,
                'sort' => 1
            ],
            [
                'name' => '2 Year',
                'year' => 2,
                'sort' => 2
            ],
            [
                'name' => '3 Year',
                'year' => 3,
                'sort' => 3
            ],
            [
                'name' => '4 Year',
                'year' => 4,
                'sort' => 4
            ],
            [
                'name' => '5 Year',
                'year' => 5,
                'sort' => 5
            ],
            [
                'name' => '6 Year',
                'year' => 6,
                'sort' => 6
            ],
            [
                'name' => '7 Year',
                'year' => 7,
                'sort' => 7
            ], [
                'name' => '8 Year',
                'year' => 8,
                'sort' => 8
            ], [
                'name' => '9 Year',
                'year' => 9,
                'sort' => 9
            ], [
                'name' => '10 Year',
                'year' => 10,
                'sort' => 10
            ]
        ];
        foreach ($durations as $key => $item) {
            Durations::create($item);
        }
    }
}
