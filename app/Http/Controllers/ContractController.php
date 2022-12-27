<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Http\Common\Constant;
use App\Models\Contracts;
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
        $contracts = Contracts::with('domains','customers')->paginate(Constant::PAGINATE);
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $status    = Status::all();
        $domains   = Domains::all();
        $packages  = Packages::all();
        return view(
            'admin.contract.create',
            [
                'status'       => $status,
                'domains'      => $domains,
                'packages'     => $packages
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
        //
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
}
