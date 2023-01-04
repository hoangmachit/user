<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designs;
use App\Models\Status;
use Validator;

class DesignController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $designs = Designs::with('status')->orderBy('id', 'desc')->paginate(parent::setting()->page_design);
        return parent::_view(
            'admin.design.index',
            [
                'designs' => $designs
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $status    = Status::all();
        return parent::_view(
            'admin.design.create',
            [
                'status' => $status
            ]
        );
    }
    private function _roles()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'url' => 'required',
            'date_start' => 'required',
            'date_finish' => 'required',
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
        $design = Designs::create($data);
        if ($design) {
            return redirect()->route('admin.design.index')->with('_success', __('alert.create.success'));
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
    public function edit(Designs $design)
    {
        $status = Status::all();
        return parent::_view(
            'admin.design.edit',
            [
                'design' => $design,
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
    public function update(Request $request, Designs $design)
    {
        $data = $request->all();
        $roles = $this->_roles();
        $validator = Validator::make($data, $roles);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $design->first_name = $data['first_name'];
        $design->last_name  = $data['last_name'];
        $design->url = $data['url'];
        $design->note = $data['note'];
        $design->date_start     = $data['date_start'];
        $design->date_finish = $data['date_finish'];
        $design->font_family = $data['font_family'];
        $design->url_example = $data['url_example'];
        $design->photo = $data['photo'];
        $design->status_id = $data['status_id'];
        if ($design->save()) {
            return redirect()->route('admin.design.edit', [$design])->with('_success', __('alert.update.success'));
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
    public function destroy(Designs $design)
    {
        $design->delete();
        return redirect()->route('admin.design.index')->with('_success', __('alert.delete.success'));
    }
}
