<?php

namespace Modules\Master\Http\Controllers\LeaveType;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Master\Entities\LeaveType;

class LeaveTypeController extends Controller
{
    public function index()
    {
        return view('master::leave_type.index');
    }

    public function create()
    {
        return view('master::create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

//        $request->request->add(['company_id', null]);
        LeaveType::create($request->all());

        flash('Leave Type Added!')->success();
        return redirect()->route('leave-type.index');
    }

    public function show($id)
    {
        return view('master::show');
    }

    public function edit($id)
    {
        $editData = LeaveType::findOrFail($id);

        return view('master::leave_type.edit-data', compact('editData'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
        ]);

        $row = LeaveType::findOrFail($id);
        $row->update($request->all());

        flash('Your data has been updated successfuly')->success();
        return redirect()->route('leave-type.index');
    }

    public function destroy($id)
    {
        LeaveType::find($id)->delete();

        flash('Your Data has been Deleted.')->error();
        return redirect()->back();
    }
}
