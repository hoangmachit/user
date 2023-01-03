<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Http\Common\Constant;
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
use PhpParser\Node\Stmt\Return_;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contracts = Contracts::with('domains', 'customers')->paginate(Constant::PAGINATE);
        return view(
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
            'status_id'        => 'required'
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
        $domains   = Domains::all();
        $packages  = Packages::all();
        $customers = Customers::all();
        $designs   = Designs::all();
        return view(
            'admin.contract.create',
            [
                'status'       => $status,
                'domains'      => $domains,
                'packages'     => $packages,
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
        //
        return view(
            'admin.contract.edit',
            [
                'status'       => $status,
                'packages'     => $packages,
                'customers'    => $customers,
                'designs'      => $designs,
                'contract'     => $contract
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function customer(Customers $customer)
    {
        $customer->image_identity_after = asset('/uploads/designs/') . "/" . $customer->identity_after;
        $customer->image_identity_before = asset('/uploads/designs/') . "/" . $customer->identity_before;
        return response([
            'customer' => $customer
        ], 200);
    }
    public function domain(Domains $domain)
    {
        return response([
            'domain' => $domain
        ], 200);
    }
    public function package(Packages $package)
    {
        return response([
            'package' => $package
        ], 200);
    }
    public function design(Designs $design)
    {
        return response([
            'design' => $design
        ], 200);
    }
    public function save_domain(Request $request)
    {
        $data = $request->all();
        $contract_id = $data['contract_id'];
        $domains = $data['domains'];
        if (!empty($domains)) {
            foreach ($domains as $key => $value) {
                $domain_id = $value['domain_id'];
                $domain = Domains::find($domain_id);
                $contract_domain  = ContractDomains::where([
                    'contract_id' => $contract_id,
                    'domain_id'   => $domain_id,
                ])->first();
                $data_insert = [
                    'name' => $domain->name,
                    'domain_name' => $domain->domain_name,
                    'address' => $domain->address,
                    'domain_init_id' => $domain->domain_init_id,
                    'note' => $domain->note,
                    'price' => $value['price'],
                    'price_special' => $value['price_special'],
                    'date_payment' => $domain->date_payment,
                    'duration_id' => $domain->duration_id,
                    'status_id' => $domain->status_id,
                    'contract_id' => $contract_id,
                    'domain_id'   => $domain_id
                ];
                if (empty($contract_domain)) {
                    ContractDomains::create($data_insert);
                } else {
                    $contract_domain->name = $domain->name;
                    $contract_domain->domain_name = $domain->domain_name;
                    $contract_domain->address = $domain->address;
                    $contract_domain->domain_init_id = $domain->domain_init_id;
                    $contract_domain->note = $domain->note;
                    $contract_domain->price = $value['price'];
                    $contract_domain->price_special = $value['price_special'];
                    $contract_domain->date_payment = $domain->date_payment;
                    $contract_domain->duration_id = $domain->duration_id;
                    $contract_domain->status_id = $domain->status_id;
                    $contract_domain->save;
                }
            }
        }
        return response([
            'data' => $data
        ], 200);
    }
    public function save_package(Request $request)
    {
        return response([
            'request' => $request
        ], 200);
    }
    public function delete_domain(Request $request)
    {
        $contract_id = $request->get('contract_id');
        $domain_id = $request->get('domain_id');
        $contract_domain = ContractDomains::where([
            'contract_id' => $contract_id,
            'domain_id'   => $domain_id
        ])->first();
        $contract_domain->delete();
        return response([
            'contract_domain' => $contract_domain
        ], 200);
    }
    public function list_domain(Request $request)
    {
        $contract_id = $request->get('contract_id');
        $domains = ContractDomains::where('contract_id', $contract_id)->get();
        $result = [];
        if (!empty($domains)) {
            foreach ($domains as $item) {
                $data = [];
                $data['domain_id'] = $item->domain_id;
                $data['old_id']    = $item->domain_id;
                $data['price']     = $item->price;
                $data['price_special'] = $item->price_special;
                $result[] = $data;
            }
        }
        return response([
            'domains' => $result
        ], 200);
    }
    public function list_package(Request $request)
    {
        $contract_id = $request->get('contract_id');
        $packages = ContractHostings::where('contract_id', $contract_id)->get();
        $result = [];
        if (!empty($packages)) {
            foreach ($packages as $item) {
                $data = [];
                $data['domain_id'] = $item->domain_id;
                $data['old_id']    = $item->domain_id;
                $data['price']     = $item->price;
                $data['price_special'] = $item->price_special;
                $result[] = $data;
            }
        }
        return response([
            'hostings' => $result
        ], 200);
    }
}
