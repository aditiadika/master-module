@extends('laraboi.app')

@section('content')
<div class="content content-fixed bd-b">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="d-sm-flex align-items-center justify-content-between">
            <div>
                <h4 class="mg-b-5">Master</h4>
                <p class="mg-b-0 tx-color-03">{{ config('clientgroup.hero.subtitle') }}</p>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="row">
            <div class="col-lg-3 col-xl-2 d-lg-block">

                <label class="tx-sans tx-10 tx-medium tx-spacing-1 tx-uppercase tx-color-03 mg-b-15">Modules</label>
                <nav class="nav nav-classic">
                    <a href="{{ route('working-location.index') }}"
                        class="nav-link {{ set_active('working-location.*') }}">Working Location</a>
                    <a href="{{ route('job-division.index') }}" class="nav-link {{ set_active('job-division.*') }}">Job
                        Division</a>
                    <a href="{{ route('job-department.index') }}"
                        class="nav-link {{ set_active('job-department.*') }}">Job Department</a>
                    <a href="{{ route('job-level.index') }}" class="nav-link {{ set_active('job-level.*') }}">Job Level
                        (Jabatan)</a>
                    <a href="{{ route('job-position.index') }}" class="nav-link {{ set_active('job-position.*') }}">Job
                        Position (Pangkat)</a>
                    <a href="{{ route('working-shift.index') }}"
                        class="nav-link {{ set_active('working-shift.*') }}">Working Shift</a>
                    <a href="{{ route('golongan.index') }}" class="nav-link {{ set_active('golongan.*') }}">Golongan</a>
                    <a href="{{ route('leave-type.index') }}" class="nav-link {{ set_active('leave-type.*') }}">Leave
                        Type</a>
                    <a href="{{ route('religion.index') }}" class="nav-link {{ set_active('religion.*') }}">Religion</a>
                    <a href="{{ route('employee-type.index') }}"
                        class="nav-link {{ set_active('employee-type.*') }}">Employee Type</a>
                    <a href="{{ route('marital-status.index') }}"
                        class="nav-link {{ set_active('marital-status.*') }}">Marital Status</a>
                </nav>
            </div>

            <div class="col-lg-9 col-xl-10">
                {{--<h3 class="mg-b-25">@yield('master::title', config('master.name'))</h3>--}}
                @yield('master::content')
            </div>
        </div>
    </div>
</div>
@endsection