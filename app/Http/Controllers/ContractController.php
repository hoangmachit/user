<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\ContractCustomers;
use App\Models\ContractDesigns;
use App\Models\ContractDomains;
use App\Models\ContractHostings;
use App\Models\Contracts;
use App\Models\Customers;
use App\Models\Domains;
use App\Models\Packages;
use App\Models\Designs;
use Carbon\Carbon;
use Validator;
use DB;

class ContractController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contracts = Contracts::with('domains', 'customers', 'hostings')->paginate(parent::setting()->page_contract);
        return parent::_view(
            'admin.contract.index',
            [
                'contracts' => $contracts
            ]
        );
    }
    private function _roles()
    {
        return [
            'name' => 'required',
            'code' => 'required',
            'signing_date' => 'required',
            'date_of_delivery' => 'required',
            'payment_1st' => 'required',
            'payment_2st' => 'required',
            'date_payment_1st' => 'required',
            'date_payment_2st' => 'required',
            'status_id'        => 'required',
            'customer_id'      => 'required',
            'design_id'        => 'required'
        ];
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $status    = Status::all();
        $customers = Customers::all();
        $designs   = Designs::all();
        return parent::_view(
            'admin.contract.create',
            [
                'status'       => $status,
                'customers'    => $customers,
                'designs'      => $designs
            ]
        );
    }
    private function price_total($prices = [])
    {
        $contract_price_1st = !empty($prices['contract_price_1st']) ? $prices['contract_price_1st'] : 0;
        $contract_price_2st = !empty($prices['contract_price_2st']) ? $prices['contract_price_2st'] : 0;
        $domain_price_special = !empty($prices['domain_price_special']) ? $prices['domain_price_special'] : 0;
        $package_price_special = !empty($prices['package_price_special']) ? $prices['package_price_special'] : 0;
        return ($contract_price_1st + $contract_price_2st +  $domain_price_special + $package_price_special);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $roles = $this->_roles();
        $validator = Validator::make($data, $roles);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        DB::beginTransaction();
        try {
            $idContract = DB::table('contracts')->insertGetId([
                'name' => $data['name'],
                'code' => $data['code'],
                'signing_date' => $data['signing_date'],
                'date_of_delivery' => $data['date_of_delivery'],
                'payment_1st' => $data['payment_1st'],
                'payment_2st' => $data['payment_2st'],
                'date_payment_1st' => $data['date_payment_1st'],
                'date_payment_2st' => $data['date_payment_2st'],
                'note' => $data['note'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'status_id' => $data['status_id'],
            ]);
            if ($idContract) {
                $prices = [];
                $prices['contract_price_1st'] = $data['payment_1st'];
                $prices['contract_price_2st'] = $data['payment_2st'];
                // Create Customer
                if (!empty($data['customer_id']) && $data['customer_id'] > 0) {
                    $single_customer = Customers::find($data['customer_id']);
                    DB::table('contract_customers')->insertGetId([
                        'last_name' => $single_customer->last_name,
                        'first_name' => $single_customer->first_name,
                        'address' => $single_customer->address,
                        'birth_day' => $single_customer->birth_day,
                        'identity_card' => $single_customer->identity_card,
                        'identity_before' => $single_customer->identity_before,
                        'identity_after' => $single_customer->identity_after,
                        'company_name' => $single_customer->company_name,
                        'company_address' => $single_customer->company_address,
                        'company_tax_code' => $single_customer->company_tax_code,
                        'email' => $single_customer->email,
                        'phone' => $single_customer->phone,
                        'zalo' => $single_customer->zalo,
                        'fax' => $single_customer->fax,
                        'note' => $single_customer->note,
                        'status_id' => $single_customer->status_id,
                        'contract_id' => $idContract,
                        'customer_id' => $single_customer->id,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
                // Create Design
                if (!empty($data['design_id']) && $data['design_id'] > 0) {
                    $single_design = Designs::find($data['design_id']);
                    DB::table('contract_designs')->insertGetId([
                        'contract_id' => $idContract,
                        'design_id' => $data['design_id'],
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
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }
            // Create Price
            $prices['contract_id'] = $idContract;
            $prices['price_total'] = $this->price_total($prices);
            $prices['created_at'] = Carbon::now();
            $prices['updated_at'] = Carbon::now();
            DB::table('contract_prices')->insertGetId($prices);
            DB::commit();
            return redirect()->route('admin.contract.edit', $idContract)->with('_success', __('alert.create.success'));
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('_errors', __('alert.create.errors'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contracts $contract)
    {
        $status    = Status::all();
        $packages  = Packages::all();
        $customers = Customers::all();
        $designs   = Designs::all();
        $contract_design  = ContractDesigns::where('contract_id', $contract->id)->first();
        $contract_customer  = ContractCustomers::where('contract_id', $contract->id)->first();
        //
        return parent::_view(
            'admin.contract.edit',
            [
                'status'       => $status,
                'packages'     => $packages,
                'customers'    => $customers,
                'designs'      => $designs,
                'contract'     => $contract,
                'contract_design' => $contract_design,
                'contract_customer' => $contract_customer
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contracts $contract)
    {
        $data = $request->all();
        $roles = $this->_roles();
        $validator = Validator::make($data, $roles);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $contract->name = $data['name'];
        $contract->code  = $data['code'];
        $contract->signing_date = $data['signing_date'];
        $contract->date_of_delivery = $data['date_of_delivery'];
        $contract->payment_1st     = $data['payment_1st'];
        $contract->payment_2st = $data['payment_2st'];
        $contract->date_payment_1st = $data['date_payment_1st'];
        $contract->date_payment_2st = $data['date_payment_2st'];
        $contract->note = $data['note'];
        $contract->status_id = $data['status_id'];
        if ($contract->save()) {
            $contract_design = ContractDesigns::where('contract_id', $contract->id)->first();
            if (!empty($contract_design)) {
                $design = Designs::find($data['design_id']);
                if (!empty($design)) {
                    $contract_design->contract_id = $contract->id;
                    $contract_design->design_id = $design->id;
                    $contract_design->first_name = $design->first_name;
                    $contract_design->last_name = $design->last_name;
                    $contract_design->url = $design->url;
                    $contract_design->note = $design->note;
                    $contract_design->date_start = $design->date_start;
                    $contract_design->date_finish = $design->date_finish;
                    $contract_design->font_family = $design->font_family;
                    $contract_design->url_example = $design->url_example;
                    $contract_design->status_id = $design->status_id;
                    $contract_design->photo = $design->photo;
                    $contract_design->save();
                }
            }
            $contract_customer = ContractCustomers::where('contract_id', $contract->id)->first();
            if (!empty($contract_customer)) {
                $customer = Customers::find($data['customer_id']);
                if (!empty($customer)) {
                    $contract_customer->contract_id = $contract->id;
                    $contract_customer->customer_id = $customer->id;
                    $contract_customer->last_name = $customer->last_name;
                    $contract_customer->first_name = $customer->first_name;
                    $contract_customer->address = $customer->address;
                    $contract_customer->birth_day = $customer->birth_day;
                    $contract_customer->identity_card = $customer->identity_card;
                    $contract_customer->identity_before = $customer->identity_before;
                    $contract_customer->identity_after = $customer->identity_after;
                    $contract_customer->company_name = $customer->company_name;
                    $contract_customer->company_address = $customer->company_address;
                    $contract_customer->company_tax_code = $customer->company_tax_code;
                    $contract_customer->email = $customer->email;
                    $contract_customer->phone = $customer->phone;
                    $contract_customer->zalo = $customer->zalo;
                    $contract_customer->fax = $customer->fax;
                    $contract_customer->note = $customer->note;
                    $contract_customer->status_id = $customer->status_id;
                    $contract_customer->save();
                }
            }
            return redirect()->route('admin.contract.edit', [$contract])->with('_success', __('alert.update.success'));
        } else {
            return redirect()->back()->withInput()->with('_success', __('alert.update.errors'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contracts $contract)
    {
        $contract->delete();
        return redirect()->route('admin.contract.index')->with('_success', __('alert.delete.success'));
    }

    //* List domain and Package  show button adđ */
    public function list()
    {
        $domains = Domains::select('id', 'domain_name', 'price', 'price_special')->get();
        $packages = Packages::select('id', 'name', 'price', 'price_special')->get();
        return sendResponse(
            [
                'domains' => $domains,
                'packages' => $packages
            ],
            'Get list data successfully !!!'
        );
    }
    //*  Get all domains and pâckge */
    public function data_all(Request $request)
    {
        $contract_id = $request->get('contract_id');
        $contract_domains   = ContractDomains::select('id', 'domain_name', 'price', 'price_special', 'domain_id')->where('contract_id', $contract_id)->get();
        foreach ($contract_domains as $key => $ct_d) {
            $ct_d->old_domain_id = $ct_d->domain_id;
        }
        $contract_packages  = ContractHostings::select('id', 'name', 'price', 'price_special', 'package_id')->where('contract_id', $contract_id)->get();
        foreach ($contract_packages as $key => $ct_p) {
            $ct_p->old_package_id = $ct_p->package_id;
        }
        return sendResponse(
            [
                'contract_domains' => $contract_domains,
                'contract_packages' => $contract_packages
            ],
            'Get all data domains and packages successfully !!!'
        );
    }
    // * GET Detail domains */
    public function detail_domain(Request $request)
    {
        $domain_id = $request->get('domain_id');
        $domain = Domains::select('id', 'domain_name', 'price', 'price_special')->find($domain_id);
        return sendResponse(
            [
                'domain' => $domain
            ],
            'Get single domain successfully !!!'
        );
    }
    // * GET Detail package */
    public function detail_package(Request $request)
    {
        $package_id = $request->get('package_id');
        $package = Packages::select('id', 'name', 'price', 'price_special')->find($package_id);
        return sendResponse(
            [
                'package' => $package
            ],
            'Get single package successfully !!!'
        );
    }

    // * DELETE DOMAINS */
    public function delete_domain(Request $request)
    {
        $contract_id = $request->get('contract_id');
        $domain      = $request->get('domain');

        $contract_domain = ContractDomains::where([
            'contract_id' => $contract_id,
            'domain_id'   => $domain['domain_id']
        ])->first();
        $data = $contract_domain;
        if (!empty($contract_domain)) {
            $contract_domain->delete();
        }
        return sendResponse(
            [
                'contract_id' => $contract_id,
                'domain' => $domain,
                'contract_domain' => $data
            ],
            'Get delete package successfully !!!'
        );
    }

    // * DELETE PACKAGE */
    public function delete_package(Request $request)
    {
        $contract_id = $request->get('contract_id');
        $package      = $request->get('package');
        $contract_package = ContractHostings::where([
            'contract_id' => $contract_id,
            'package_id'   => $package['package_id']
        ])->first();
        $data = $contract_package;
        if (!empty($contract_package)) {
            $contract_package->delete();
        }
        return sendResponse(
            [
                'contract_id' => $contract_id,
                'package' => $package,
                'contract_package' => $data
            ],
            'Get delete package successfully !!!'
        );
    }
    // * SAVE CONTRACT DOMAINS */
    public function save_domain(Request $request)
    {
        $contract_domains = $request->get('contract_domains');
        $contract_id      = $request->get('contract_id');
        foreach ($contract_domains as $key => $cd) {
            $domain_id = $cd['domain_id'];
            $old_domain_id = $cd['old_domain_id'];
            if ((int)$domain_id > 0) {
                $ct_domain = ContractDomains::where([
                    'contract_id' => $contract_id,
                    'domain_id'   => $old_domain_id
                ])->first();
                $domain = Domains::find($domain_id);
                if (empty($ct_domain)) {
                    ContractDomains::create([
                        'contract_id' => $contract_id,
                        'domain_id' => $domain->id,
                        'name' => $domain->name,
                        'domain_name' => $domain->domain_name,
                        'address' => $domain->address,
                        'domain_init_id' => $domain->domain_init_id,
                        'note' => $domain->note,
                        'price' => $domain->price,
                        'price_special' => $domain->price_special,
                        'date_payment' => $domain->date_payment,
                        'duration_id' => $domain->duration_id,
                        'status_id' => $domain->status_id,
                    ]);
                } else {
                    $ct_domain->contract_id =  $contract_id;
                    $ct_domain->domain_id =  $domain->id;
                    $ct_domain->name =  $domain->name;
                    $ct_domain->domain_name =  $domain->domain_name;
                    $ct_domain->address =  $domain->address;
                    $ct_domain->domain_init_id =  $domain->domain_init_id;
                    $ct_domain->note =  $domain->note;
                    $ct_domain->price =  $domain->price;
                    $ct_domain->price_special =  $domain->price_special;
                    $ct_domain->date_payment =  $domain->date_payment;
                    $ct_domain->duration_id =  $domain->duration_id;
                    $ct_domain->status_id =  $domain->status_id;
                    $ct_domain->save();
                }
            }
        }
        return sendResponse(
            [],
            'Get save domain successfully !!!'
        );
    }
    // * SAVE CONTRACT PACKAGE */
    public function save_package(Request $request)
    {
        $contract_packages = $request->get('contract_packages');
        $contract_id      = $request->get('contract_id');
        foreach ($contract_packages as $key => $cd) {
            $package_id = $cd['package_id'];
            $old_package_id = $cd['old_package_id'];
            if ((int)$package_id > 0) {
                $ct_package = ContractHostings::where([
                    'contract_id' => $contract_id,
                    'package_id'   => $old_package_id
                ])->first();
                $package = Packages::find($package_id);
                if (empty($ct_package)) {
                    ContractHostings::create([
                        'contract_id' => $contract_id,
                        'package_id' => $package->id,
                        'name' => $package->name,
                        'gb' => $package->gb,
                        'ram' => $package->ram,
                        'price' => $package->price,
                        'price_special' => $package->price_special,
                        'package_infomations' => 'No infomations',
                        'status_id' => $package->status_id
                    ]);
                } else {
                    $ct_package->contract_id =  $contract_id;
                    $ct_package->package_id =  $package->id;
                    $ct_package->name =  $package->name;
                    $ct_package->gb =  $package->gb;
                    $ct_package->ram =  $package->ram;
                    $ct_package->price =  $package->price;
                    $ct_package->price_special =  $package->price_special;
                    $ct_package->status_id =  $package->status_id;
                    $ct_package->package_infomations = 'No infomations';
                    $ct_package->save();
                }
            }
        }
        return sendResponse(
            [],
            'Get save package successfully !!!'
        );
    }
}
