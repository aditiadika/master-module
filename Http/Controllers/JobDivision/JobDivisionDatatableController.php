<?php

namespace Modules\Master\Http\Controllers\JobDivision;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Master\Entities\JobDivision;
use Yajra\DataTables\DataTables;

class JobDivisionDatatableController extends Controller
{
    public function datatable()
    {
        $religion = JobDivision::orderBy('name', 'ASC')->get();

        return DataTables::of($religion)
            ->editColumn('is_active', function ($religion) {
                return $religion->is_active == true ? '<span class="badge badge-info">Active</span>' : '<span class="badge badge-warning">Not Active</span>';
            })
            ->editColumn('action', function ($religion) {
                $edit  = '<a href="' . route('job-division.edit', $religion->id) . '"
                                class="btn btn-xs btn-info">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </a>';
                $delete = '<a data-href="' . route('job-division.destroy', $religion->id) . '" data-toggle="modal" data-target="#confirm-delete-modal"
                                class="btn btn-xs btn-danger" style="margin-left: 10px">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>';

                return $edit . $delete;
            })
            ->rawColumns(['is_active', 'action'])
            ->make(true);
    }
}
