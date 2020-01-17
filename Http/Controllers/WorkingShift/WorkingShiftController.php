<?php

namespace Modules\Master\Http\Controllers\WorkingShift;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Master\Entities\WorkingShift;

class WorkingShiftController extends Controller
{
    public function index()
    {
        return view('master::working_shift.index');
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
        WorkingShift::create($request->all());

        flash('Working Shift Added!')->success();
        return redirect()->route('working-shift.index');
    }

    public function show($id)
    {
        return view('master::show');
    }

    public function edit($id)
    {
        $editData = WorkingShift::findOrFail($id);

        return view('master::working_shift.edit-data', compact('editData'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $row = WorkingShift::findOrFail($id);
        $row->update($request->all());

        flash('Your data has been updated successfuly')->success();
        return redirect()->route('working-shift.index');
    }

    public function destroy($id)
    {
        WorkingShift::find($id)->delete();

        flash('Your Data has been Deleted.')->error();
        return redirect()->back();
    }
}
