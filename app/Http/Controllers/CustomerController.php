<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\Customers;
use Validator;

class CustomerController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customers::orderBy('id', 'desc')->paginate(parent::setting()->page_customer);
        return parent::_view(
            'admin.customer.index',
            [
                'customers' => $customers
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status    = Status::all();
        return parent::_view(
            'admin.customer.create',
            [
                'status'       => $status
            ]
        );
    }
    private function _roles()
    {
        return [
            'last_name' => 'required',
            'first_name' => 'required',
            'address' => 'required',
            'birth_day' => 'required',
            'identity_card' => 'required',
            'phone' => 'required',
            'zalo' => 'required',
            'status_id' => 'required',
        ];
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
        $customer = Customers::create($data);
        if ($customer) {
            return redirect()->route('admin.customer.index')->with('_success', __('alert.create.success'));
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
    public function edit(Customers $customer)
    {
        $status = Status::all();
        return parent::_view(
            'admin.customer.edit',
            [
                'status'   => $status,
                'customer' => $customer,
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
    public function update(Request $request, Customers $customer)
    {
        $data = $request->all();
        $roles = $this->_roles();
        $validator = Validator::make($data, $roles);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $customer->last_name = $data['last_name'];
        $customer->first_name  = $data['first_name'];
        $customer->address = $data['address'];
        $customer->birth_day = $data['birth_day'];
        $customer->identity_card = $data['identity_card'];
        $customer->identity_after = $data['identity_after'];
        $customer->identity_before = $data['identity_before'];
        $customer->company_name = $data['company_name'];
        $customer->company_address = $data['company_address'];
        $customer->company_tax_code = $data['company_tax_code'];
        $customer->email = $data['email'];
        $customer->phone = $data['phone'];
        $customer->zalo = $data['zalo'];
        $customer->fax = $data['fax'];
        $customer->note = $data['note'];
        $customer->status_id = $data['status_id'];
        if ($customer->save()) {
            return redirect()->route('admin.customer.edit', [$customer])->with('_success', __('alert.update.success'));
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
    public function destroy(Customers $customer)
    {
        $customer->delete();
        return redirect()->route('admin.customer.index')->with('_success', __('alert.delete.success'));
    }
}
