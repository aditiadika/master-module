<?php

namespace Modules\Master\Http\Controllers\EmployeeType;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Master\Entities\EmployeeType;

class EmployeeTypeController extends Controller
{
    public function index()
    {
        return view('master::employee_type.index');
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

        EmployeeType::create($request->all());

        flash('Employee Type Added!')->success();
        return redirect()->route('employee-type.index');
    }

    public function show($id)
    {
        return view('master::show');
    }

    public function edit($id)
    {
        $editData = EmployeeType::findOrFail($id);

        return view('master::employee_type.edit-data', compact('editData'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
        ]);

        $row = EmployeeType::findOrFail($id);
        $row->update($request->all());

        flash('Your data has been updated successfuly')->success();
        return redirect()->route('employee-type.index');
    }

    public function destroy($id)
    {
        EmployeeType::find($id)->delete();

        flash('Your Data has been Deleted.')->error();
        return redirect()->back();
    }
}
