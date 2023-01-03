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
                'name' => 'PHẠM NGỌC LUYẾN ( CHỊ NGỌC )',
                'domain_name' => 'usananian.com',
                'address' => '27 WINNMA AVE VIC3976',
                'domain_init_id' => 1,
                'note' => "Thông Tin Tên Miền Tên miền	usananian.com Mật khẩu fu24A9Kv7YPt",
                'price' => 241000,
                'price_special' => 241000,
                'date_payment' => '2023-06-24',
                'duration_id' => 1,
                'status_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'NGUYỄN TUẤN HƯNG',
                'domain_name' => 'bellapermanent-makeup.com',
                'address' => '4/23 Phạm Ngọc Thạch, Phường 9, Thành Phố Vũng Tàu, Bà Rịa-Vũng Tàu',
                'domain_init_id' => 1,
                'note' => "Thông Tin Tên Miền Tên miền	bellapermanent-makeup.com Mật khẩu	Hu527raRdP6C",
                'price' => 241000,
                'price_special' => 241000,
                'date_payment' => '2023-05-31',
                'duration_id' => 1,
                'status_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'ĐẶNG TẤN XUÂN',
                'domain_name' => 'xaydungmiennam.com.vn',
                'address' => '72 Văn Cao, TP Hồ Chí Minh',
                'domain_init_id' => 4,
                'note' => "http://domain.nina.vn Domain : xaydungmiennam.com.vn Mat khau moi: phdQ541NFw7M",
                'price' => 0,
                'price_special' => 0,
                'date_payment' => '2025-05-31',
                'duration_id' => 3,
                'status_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'CÔNG TY TNHH MỘT THÀNH VIÊN THƯƠNG MẠI Ô TÔ VŨ HÙNG',
                'domain_name' => 'otovuhung.vn',
                'address' => '114 Nguyễn Cửu Đàm, Phường Tân Sơn Nhì, Quận Tân Phú, tp. Hồ Chí Minh',
                'domain_init_id' => 3,
                'note' => "otovuhung.com.vn otovuhung.vn User: otovuhung898@gmail.com Pw: Otovuhung@123!@# Link: inet.vn",
                'price' => 0,
                'price_special' => 0,
                'date_payment' => '2023-02-23',
                'duration_id' => 1,
                'status_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];
        foreach ($domains as $key => $item) {
            Domains::create($item);
        }
    }
}
