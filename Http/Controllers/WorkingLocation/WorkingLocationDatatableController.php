<?php

namespace Modules\Master\Http\Controllers\WorkingLocation;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Master\Entities\WorkingLocation;
use Yajra\DataTables\DataTables;

class WorkingLocationDatatableController extends Controller
{
    public function datatable()
    {
        $data = WorkingLocation::orderBy('name', 'ASC')->get();

        return DataTables::of($data)
            ->editColumn('is_active', function ($data) {
                return $data->is_active == true ? '<span class="badge badge-info">Active</span>' : '<span class="badge badge-warning">Not Active</span>';
            })
            ->editColumn('action', function ($data) {
                $edit  = '<a href="' . route('working-location.edit', $data->id) . '"
                                class="btn btn-xs btn-info">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </a>';
                $delete = '<a data-href="' . route('working-location.destroy', $data->id) . '" data-toggle="modal" data-target="#confirm-delete-modal"
                                class="btn btn-xs btn-danger" style="margin-left: 10px">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>';

                return $edit . $delete;
            })
            ->rawColumns(['is_active', 'action'])
            ->make(true);
    }
}
