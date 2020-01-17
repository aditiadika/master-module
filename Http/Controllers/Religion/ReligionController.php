<?php

namespace Modules\Master\Http\Controllers\Religion;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Master\Entities\Religion;

class ReligionController extends Controller
{
    public function index()
    {
        return view('master::religion.index');
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
        Religion::create($request->all());

        flash('Religion Added!')->success();
        return redirect()->route('religion.index');
    }

    public function show($id)
    {
        return view('master::show');
    }

    public function edit($id)
    {
        $editData = Religion::findOrFail($id);

        return view('master::religion.edit-data', compact('editData'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
        ]);

        $row = Religion::findOrFail($id);
        $row->update($request->all());

        flash('Your data has been updated successfuly')->success();
        return redirect()->route('religion.index');
    }

    public function destroy($id)
    {
        Religion::find($id)->delete();

        flash('Your Data has been Deleted.')->error();
        return redirect()->back();
    }
}
