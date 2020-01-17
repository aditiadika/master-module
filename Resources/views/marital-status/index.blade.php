@extends('master::layouts.master')

@section('master::content')
<div class="container">
    <div class="row my-3">
        <div class="col-md-12">
            <div class="card-body">
                <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
                    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
                        <div class="">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="{{ url('/master') }}">Master</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="#">Marital Status</a>
                                    </li>
                                </ol>
                            </nav>
                            <h4 class="mg-b-0 tx-spacing--1">Marital Status</h4>
                        </div>
                        <div class="text-right">
                            <a class="btn btn-sm pd-x-15 btn-white btn-uppercase" id="add-btn">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>
                        </div>
                    </div>
                    @include('flash::message')
                    <table class="table table-bordered table-hover table-striped w100" cellspacing="0" id="datatable">
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    @include('master::marital-status.create')
</div>
@endsection

@section('scripts')
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

@include('include.delete-modal')

<script type="text/javascript">
    $(document).ready(function () {
            $('#datatable').dataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    method: 'POST',
                    url: '{{ route('marital-status.datatable') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                columns: [
                    {
                        title: 'Code',
                        data: 'code',
                        name: 'code',
                        class: 'text-center',
                        defaultContent: '-'
                    },
                    {
                        title: 'Name',
                        data: 'name',
                        name: 'name',
                        class: 'text-center',
                        defaultContent: '-'
                    },
                    {
                        title: 'Description',
                        data: 'description',
                        name: 'description',
                        class: 'text-center',
                        defaultContent: '-'
                    },
                    {
                        title: 'Status',
                        data: 'is_active',
                        name: 'is_active',
                        class: 'text-center',
                        defaultContent: '-'
                    },
                    {
                        title: 'Action',
                        data: 'action',
                        name: 'action',
                        searchable: false,
                        orderable: false,
                        class: 'text-center'
                    }
                ],
            });

            $('#add-btn').click(function (e) {
                $('#add-form').toggle();
                jQuery("html, body").animate({
                    scrollTop: $('#add-form').offset().top - 100
                }, "slow");
            });
            $('#cancel-btn').click(function (e) {
                $('#add-form').toggle();
                jQuery("html, body").animate({
                    scrollTop: $('body').offset().top - 100
                }, "slow");
            });
        });
</script>
@endsection