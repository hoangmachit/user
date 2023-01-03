<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contracts;
use App\Models\ContractCustomers;
use App\Models\ContractPrices;
use App\Models\ContractDesigns;
use App\Models\ContractDomains;
use App\Models\ContractHostings;
use App\Models\Customers;
use App\Models\Designs;
use App\Models\Domains;
use App\Models\Packages;
use Carbon\Carbon;

class ContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contracts = [
            [
                'id'   => 4,
                'name' => 'Hà Thị Bích Trâm',
                'code' => 'TKW001',
                'signing_date' => Carbon::now(),
                'date_of_delivery' => Carbon::now(),
                'payment_1st'  => 3500000,
                'payment_2st'  => 7600000,
                'date_payment_1st' => Carbon::now(),
                'date_payment_2st' => Carbon::now(),
                'note' => "My Note ComPany Hà Thị Bích Trâm",
                'status_id' => 1,
                'customer_id' => 4,
                'design_id' => 3,
                'package_id' => 2,
                'domain_id' => 2,
                'prices' => [
                    'contract_price_1st' => 111,
                    'contract_price_2st' => 111,
                    'domain_price' => 111,
                    'domain_price_special' => 111,
                    'package_price' => 111,
                    'package_price_special' => 111,
                    'price_total' => 111,
                ]
            ],
            [
                'id'   => 1,
                'name' => 'Mạch Văn Hải',
                'code' => 'TKW002',
                'signing_date' => Carbon::now(),
                'date_of_delivery' => Carbon::now(),
                'payment_1st'  => 4200000,
                'payment_2st'  => 3600000,
                'date_payment_1st' => Carbon::now(),
                'date_payment_2st' => Carbon::now(),
                'note' => "My Note ComPany Mạch Văn Hải",
                'status_id' => 1,
                'customer_id' => 3,
                'design_id' => 1,
                'package_id' => 2,
                'domain_id' => 2,
                'prices' => [
                    'contract_price_1st' => 111,
                    'contract_price_2st' => 111,
                    'domain_price' => 111,
                    'domain_price_special' => 111,
                    'package_price' => 111,
                    'package_price_special' => 111,
                    'price_total' => 111,
                ]
            ],
            [
                'id'   => 2,
                'name' => 'Phạm Bá Thọ',
                'code' => 'TKW003',
                'signing_date' => Carbon::now(),
                'date_of_delivery' => Carbon::now(),
                'payment_1st'  => 3300000,
                'payment_2st'  => 4400000,
                'date_payment_1st' => Carbon::now(),
                'date_payment_2st' => Carbon::now(),
                'note' => "My Note ComPany Phạm Bá Thọ",
                'status_id' => 1,
                'customer_id' => 2,
                'design_id' => 1,
                'package_id' => 3,
                'domain_id' => 2,
                'prices' => [
                    'contract_price_1st' => 111,
                    'contract_price_2st' => 111,
                    'domain_price' => 111,
                    'domain_price_special' => 111,
                    'package_price' => 111,
                    'package_price_special' => 111,
                    'price_total' => 111,
                ]
            ],
            [
                'id'   => 3,
                'name' => 'Lê Văn Long',
                'code' => 'TKW004',
                'signing_date' => Carbon::now(),
                'date_of_delivery' => Carbon::now(),
                'payment_1st'  => 1200000,
                'payment_2st'  => 3500000,
                'date_payment_1st' => Carbon::now(),
                'date_payment_2st' => Carbon::now(),
                'note' => "My Note ComPany Phạm Bá Thọ",
                'status_id' => 1,
                'customer_id' => 1,
                'design_id' => 3,
                'package_id' => 2,
                'domain_id' => 2,
                'prices' => [
                    'contract_price_1st' => 111,
                    'contract_price_2st' => 111,
                    'domain_price' => 111,
                    'domain_price_special' => 111,
                    'package_price' => 111,
                    'package_price_special' => 111,
                    'price_total' => 111,
                ]
            ]
        ];

        foreach ($contracts as $key => $item) {
            $data_contract = [
                'name' => $item['name'],
                'code' => $item['code'],
                'signing_date' => $item['signing_date'],
                'date_of_delivery' => $item['date_of_delivery'],
                'payment_1st'  => $item['payment_1st'],
                'payment_2st'  => $item['payment_2st'],
                'date_payment_1st' => $item['date_payment_1st'],
                'date_payment_2st' => $item['date_payment_2st'],
                'note' => $item['note'],
                'status_id' => $item['status_id'],
            ];
            $contract = Contracts::create($data_contract);
            if (!empty($contract)) {
                // contract Customer
                $single_customer = Customers::find($item['customer_id']);
                $customer = [];
                $customer['contract_id'] = $contract->id;
                $customer['customer_id'] = $single_customer->id;
                $customer['last_name'] = $single_customer->last_name;
                $customer['first_name'] = $single_customer->first_name;
                $customer['address'] = $single_customer->address;
                $customer['birth_day'] = $single_customer->birth_day;
                $customer['identity_card'] = $single_customer->identity_card;
                $customer['identity_before'] = $single_customer->identity_before;
                $customer['identity_after'] = $single_customer->identity_after;
                $customer['company_name'] = $single_customer->company_name;
                $customer['company_address'] = $single_customer->company_address;
                $customer['company_tax_code'] = $single_customer->company_tax_code;
                $customer['email'] = $single_customer->email;
                $customer['phone'] = $single_customer->phone;
                $customer['zalo'] = $single_customer->zalo;
                $customer['fax'] = $single_customer->fax;
                $customer['note'] = $single_customer->note;
                $customer['status_id'] = $single_customer->status_id;
                ContractCustomers::create($customer);
                // contract Design
                $single_design = Designs::find($item['design_id']);
                ContractDesigns::create([
                    'contract_id' => $contract->id,
                    'design_id'   => $single_design->id,
                    'first_name' => $single_design->first_name,
                    'last_name' => $single_design->last_name,
                    'url' => $single_design->url,
                    'note' => $single_design->note,
                    'date_start' => $single_design->date_start,
                    'date_finish' => $single_design->date_finish,
                    'font_family' => $single_design->font_family,
                    'url_example' => $single_design->url_example,
                    'status_id' => $single_design->status_id,
                    'photo' => $single_design->photo,
                ]);
                // contract Domain
                $single_domain = Domains::find($item['domain_id']);
                ContractDomains::create([
                    'contract_id' => $contract->id,
                    'domain_id'   => $single_domain->id,
                    'name'   => $single_domain->name,
                    'domain_name'   => $single_domain->domain_name,
                    'address'   => $single_domain->address,
                    'domain_init_id'   => $single_domain->domain_init_id,
                    'note'   => $single_domain->note,
                    'price'   => $single_domain->price,
                    'price_special'   => $single_domain->price_special,
                    'date_payment'   => $single_domain->date_payment,
                    'duration_id'   => $single_domain->duration_id,
                    'status_id'   => $single_domain->status_id,
                ]);
                // contract Hosting
                $single_package = Packages::find($item['package_id']);
                ContractHostings::create([
                    'contract_id' => $contract->id,
                    'package_id'  => $single_package->id,
                    'name' => $single_package->name,
                    'gb' => $single_package->gb,
                    'ram' => $single_package->ram,
                    'price' => $single_package->price,
                    'price_special' => $single_package->price_special,
                    'package_infomations' => 'Thông tin tài khoản here',
                    'status_id' => $single_package->status_id
                ]);
                // contract Prices
                $price = [];
                $price = $item['prices'];
                $price['contract_id'] = $contract->id;
                ContractPrices::create($price);
            }
        }
    }
}
