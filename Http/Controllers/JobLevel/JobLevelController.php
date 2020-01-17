<?php

namespace Modules\Master\Http\Controllers\JobLevel;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Master\Entities\JobLevel;

class JobLevelController extends Controller
{
    public function index()
    {
        return view('master::job_level.index');
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
        JobLevel::create($request->all());

        flash('Job Level Added!')->success();
        return redirect()->route('job-level.index');
    }

    public function show($id)
    {
        return view('master::show');
    }

    public function edit($id)
    {
        $editData = JobLevel::findOrFail($id);

        return view('master::job_level.edit-data', compact('editData'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
        ]);

        $row = JobLevel::findOrFail($id);
        $row->update($request->all());

        flash('Your data has been updated successfuly')->success();
        return redirect()->route('job-level.index');
    }

    public function destroy($id)
    {
        JobLevel::find($id)->delete();

        flash('Your Data has been Deleted.')->error();
        return redirect()->back();
    }
}
