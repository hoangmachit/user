<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Http\Common\Constant;
use App\Models\Contracts;
use App\Models\Customers;
use App\Models\Domains;
use App\Models\Packages;
use Validator;

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
        return view(
            'admin.contract.create',
            [
                'status'       => $status,
                'domains'      => $domains,
                'packages'     => $packages,
                'customers'    => $customers
            ]
        );
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
        $contract = Contracts::create($data);
        if ($contract) {
            return redirect()->route('admin.contract.index')->with('_success', __('alert.create.success'));
        } else {
            return redirect()->back()->withInput()->with('_success', __('alert.create.errors'));
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
    public function edit($id)
    {
        //
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
}
