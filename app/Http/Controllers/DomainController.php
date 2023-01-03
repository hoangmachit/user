<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domains;
use App\Models\DomainInits;
use App\Models\Durations;
use App\Models\Status;
use Validator;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $domains = Domains::with('domain_init', 'status', 'duration')->orderBy('id', 'desc')->get();
        return view(
            'admin.domain.index',
            [
                'domains' => $domains
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
        $domain_inits = DomainInits::all();
        $durations = Durations::all();
        $status    = Status::all();
        return view(
            'admin.domain.create',
            [
                'domain_inits' => $domain_inits,
                'durations'    => $durations,
                'status'       => $status
            ]
        );
    }
    private function _roles()
    {
        return [
            'name' => 'required',
            'domain_name' => 'required',
            'domain_init_id' => 'required',
            'price' => 'required',
            'price_special' => 'required',
            'date_payment' => 'required',
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
        $domain = Domains::create($data);
        if ($domain) {
            return redirect()->route('admin.domain.index')->with('_success', __('alert.create.success'));
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
    public function edit(Domains $domain)
    {
        $domain_inits = DomainInits::all();
        $durations = Durations::all();
        $status = Status::all();
        return view(
            'admin.domain.edit',
            [
                'domain' => $domain,
                'domain_inits' => $domain_inits,
                'durations'    => $durations,
                'status'       => $status
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
    public function update(Request $request, Domains $domain)
    {
        $data = $request->all();
        $roles = $this->_roles();
        $validator = Validator::make($data, $roles);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $domain->name = $data['name'];
        $domain->domain_name  = $data['domain_name'];
        $domain->address = $data['address'];
        $domain->domain_init_id = $data['domain_init_id'];
        $domain->note = $data['note'];
        $domain->price = $data['price'];
        $domain->price_special = $data['price_special'];
        $domain->date_payment = $data['date_payment'];
        $domain->duration_id = $data['duration_id'];
        $domain->status_id = $data['status_id'];
        if ($domain->save()) {
            return redirect()->route('admin.domain.edit', [$domain])->with('_success', __('alert.update.success'));
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
    public function destroy(Domains $domain)
    {
        $domain->delete();
        return redirect()->route('admin.domain.index')->with('_success', __('alert.delete.success'));
    }
    public function all(Request $request)
    {
        $all_domains = Domains::all();
        return response([
            'all_domains' => $all_domains
        ], 200);
    }
}
