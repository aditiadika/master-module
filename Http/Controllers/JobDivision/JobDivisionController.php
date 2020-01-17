<?php

namespace Modules\Master\Http\Controllers\JobDivision;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Master\Entities\JobDivision;

class JobDivisionController extends Controller
{
    public function index()
    {
        return view('master::job_division.index');
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
        JobDivision::create($request->all());

        flash('Job Division Added!')->success();
        return redirect()->route('job-division.index');
    }

    public function show($id)
    {
        return view('master::show');
    }

    public function edit($id)
    {
        $editData = JobDivision::findOrFail($id);

        return view('master::job_division.edit-data', compact('editData'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
        ]);

        $row = JobDivision::findOrFail($id);
        $row->update($request->all());

        flash('Your data has been updated successfuly')->success();
        return redirect()->route('job-division.index');
    }

    public function destroy($id)
    {
        JobDivision::find($id)->delete();

        flash('Your Data has been Deleted.')->error();
        return redirect()->back();
    }
}
