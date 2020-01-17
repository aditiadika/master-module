<?php

namespace Modules\Master\Http\Controllers\JobDepartment;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Master\Entities\JobDepartment;

class JobDepartmentController extends Controller
{
    public function index()
    {
        return view('master::job_department.index');
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
        JobDepartment::create($request->all());

        flash('Job Division Added!')->success();
        return redirect()->route('job-department.index');
    }

    public function show($id)
    {
        return view('master::show');
    }

    public function edit($id)
    {
        $editData = JobDepartment::findOrFail($id);

        return view('master::job_department.edit-data', compact('editData'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
        ]);

        $row = JobDepartment::findOrFail($id);
        $row->update($request->all());

        flash('Your data has been updated successfuly')->success();
        return redirect()->route('job-department.index');
    }

    public function destroy($id)
    {
        JobDepartment::find($id)->delete();

        flash('Your Data has been Deleted.')->error();
        return redirect()->back();
    }
}
