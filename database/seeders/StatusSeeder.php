<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            [
                'name' => 'Private',
                'type' => 'private',
                'class' => 'private',
                'sort'  => 1
            ],
            [
                'name' => 'Published',
                'type' => 'published',
                'class' => 'published',
                'sort'  => 2
            ]
        ];
        foreach ($status as $key => $item) {
           Status::create($item);
        }
    }
}
