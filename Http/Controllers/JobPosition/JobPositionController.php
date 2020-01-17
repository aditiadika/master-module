<?php

namespace Modules\Master\Http\Controllers\JobPosition;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Master\Entities\JobPosition;

class JobPositionController extends Controller
{
    public function index()
    {
        return view('master::job_position.index');
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
        JobPosition::create($request->all());

        flash('Job Position Added!')->success();
        return redirect()->route('job-position.index');
    }

    public function show($id)
    {
        return view('master::show');
    }

    public function edit($id)
    {
        $editData = JobPosition::findOrFail($id);

        return view('master::job_position.edit-data', compact('editData'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
        ]);

        $row = JobPosition::findOrFail($id);
        $row->update($request->all());

        flash('Your data has been updated successfuly')->success();
        return redirect()->route('job-position.index');
    }

    public function destroy($id)
    {
        JobPosition::find($id)->delete();

        flash('Your Data has been Deleted.')->error();
        return redirect()->back();
    }
}
