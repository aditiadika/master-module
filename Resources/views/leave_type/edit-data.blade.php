@extends('master::layouts.master')

@section('master::content')
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
            <div class="">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Master</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="{{ route('leave-type.index') }}">Leave Type</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="#">edit</a>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="text-right">
                <a href="{{ route('leave-type.index') }}" title="Back">
                    <button class="btn btn-xs btn-warning">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                    </button>
                </a>
            </div>
        </div>
        <div class="container">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <h4>Edit Leave Type</h4>
                            </div>
                            <div class="portlet-body">
                                @include('flash::message')
                                <form action="{{ route('leave-type.update', $editData->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                                        <label for="code">Code</label>
                                        <input type="text" name="code" class="form-control"
                                               value='{{ $editData->code }}'/>
                                        @if ($errors->has('code'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control"
                                               value='{{ $editData->name }}'/>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" rows="2" name="description"
                                                  placeholder="Textarea">{!! $editData->description !!}</textarea>
                                    </div>
                                    <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }}">
                                        <label for="active">Active</label>
                                        <select name="is_active" class="form-control">
                                            <option value="1" {{ $editData->is_active == true ? 'selected': '' }}>Active</option>
                                            <option value="0" {{ $editData->is_active == false ? 'selected': '' }}>Inactive</option>
                                        </select>
                                        @if ($errors->has('active'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('active') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <button type="button" id="cancel-btn" class="btn btn-danger">
                                        Cancel
                                    </button>
                                    <button type="submit" class="btn btn-primary pull-right">Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection