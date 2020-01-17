<?php

namespace Modules\Master\Http\Controllers\MaritalStatus;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Master\Entities\MaritalStatus;

class MaritalStatusController extends Controller
{
    public function index()
    {
        return view('master::marital-status.index');
    }

    public function create()
    {
        return view('master::create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);

        MaritalStatus::create($request->all());

        flash('Your data has been created')->success();
        return redirect()->route('marital-status.index');
    }

    public function show($id)
    {
        return view('master::show');
    }

    public function edit($id)
    {
        $editData = MaritalStatus::findOrFail($id);
        return view('master::marital-status.edit-data', compact('editData'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);

        $row = MaritalStatus::findOrFail($id);
        $row->update($request->all());

        flash('Your data has been updated successfuly')->success();
        return redirect()->route('marital-status.index');
    }

    public function destroy($id)
    {
        MaritalStatus::find($id)->delete();

        flash('Your Data has been Deleted.')->error();
        return redirect()->back();
    }
}
