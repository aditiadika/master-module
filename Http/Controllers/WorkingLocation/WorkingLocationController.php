<?php

namespace Modules\Master\Http\Controllers\WorkingLocation;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Master\Entities\WorkingLocation;

class WorkingLocationController extends Controller
{
    public function index()
    {
        return view('master::working_location.index');
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

        WorkingLocation::create($request->all());

        flash('Working Location Added!')->success();
        return redirect()->route('working-location.index');
    }

    public function show($id)
    {
        return view('master::show');
    }

    public function edit($id)
    {
        $editData = WorkingLocation::findOrFail($id);

        return view('master::working_location.edit-data', compact('editData'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $row = WorkingLocation::findOrFail($id);
        $row->update($request->all());

        flash('Your data has been updated successfuly')->success();
        return redirect()->route('working-location.index');
    }

    public function destroy($id)
    {
        WorkingLocation::find($id)->delete();

        flash('Your Data has been Deleted.')->error();
        return redirect()->back();
    }
}
