@extends('admin.layouts.app')

@push('breadcrumb')
    {!! Breadcrumbs::render('users_list') !!}
@endpush

@push('extra-css-styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" />
@endpush

@section('content')
    <div class="container">

        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="fas fa-users text-primary"></i>
                    </span>
                    <h3 class="card-label">{{ $custom_title }}</h3>
                </div>

                <div class="card-toolbar">
                    @if (in_array('delete', $permissions))
                        <a href="{{ route('admin.customers.destroy', 0) }}" name="del_select" id="del_select"
                            class="btn btn-sm btn-light-danger font-weight-bolder text-uppercase mr-2 delete_all_link">
                            <i class="far fa-trash-alt"></i> Delete Selected
                        </a>
                    @endif
                    @if (in_array('add', $permissions))
                        <a href="{{ route('admin.customers.create') }}"
                            class="btn btn-sm btn-primary font-weight-bolder text-uppercase">
                            <i class="fas fa-plus"></i>
                            Add {{ $custom_title }}
                        </a>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <label for=""> Customer Status</label>
                <select name="dlstatus" id="dlstatus">
                    <option value="0">All</option>
                    <option value="y">Active</option>
                    <option value="n">In Active</option>
                </select>
            </div>
            <div class="card-body">
                {{-- Datatable Start --}}
                <table class="table table-bordered table-hover table-checkable" id="users_table"
                    style="margin-top: 13px !important"></table>
                {{-- Datatable End --}}
            </div>
        </div>
    </div>
@endsection

@push('extra-js-scripts')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script>
        function getDatatable() {
            // datatable
            let customer_status = $("#dlstatus").val();
            // alert(customer_status);
            oTable = $('#users_table').DataTable({
                responsive: true,
                searchDelay: 500,
                destroy: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.customers.listing') }}",
                    data: {
                        columnsDef: ['checkbox', 'first_name', 'last_name', 'email', 'contact_no', 'active',
                            'action'
                        ],
                        customer_status: customer_status,
                    },
                },
                columns: [{
                        data: 'checkbox'
                    },
                    {
                        data: 'first_name'
                    },
                    {
                        data: 'last_name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'contact_no'
                    },
                    {
                        data: 'active'
                    },
                    {
                        data: 'action',
                        responsivePriority: -1
                    },
                ],
                columnDefs: [
                    // Specify columns titles here...
                    {
                        targets: 0,
                        title: "<center><input type='checkbox' class='all_select'></center>",
                        orderable: false
                    },
                    {
                        targets: 1,
                        title: 'First Name',
                        orderable: true
                    },
                    {
                        targets: 2,
                        title: 'Last Name',
                        orderable: true
                    },
                    {
                        targets: 3,
                        title: 'Email',
                        orderable: true
                    },
                    {
                        targets: 4,
                        title: 'Contact Number',
                        orderable: true
                    },
                    {
                        targets: 5,
                        title: 'Active',
                        orderable: false
                    },
                    // Action buttons
                    {
                        targets: -1,
                        title: 'Action',
                        orderable: false
                    },
                ],
                order: [
                    [1, 'asc']
                ],
                lengthMenu: [
                    [10, 20, 50, 100],
                    [10, 20, 50, 100]
                ],
                pageLength: 10,
            });
        }
        $(document).ready(function() {
            getDatatable();
        });
        $(document).on('change', '#dlstatus', function() {

            getDatatable();
        });
    </script>
@endpush
