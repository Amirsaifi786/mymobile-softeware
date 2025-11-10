@extends('Layouts.app')
@section('style')
    <style>

    </style>
    <link rel="stylesheet" href="{{ url('assets/css/dataTables.bootstrap5.min.css') }}">
@endsection
@section('content')
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-2">
        <div class="mb-3">
            {{-- <h1 class="mb-1">Welcome, {{ ucwords(Auth::user()->name ?? Admin) }}</h1> --}}
            <h1 class="mb-1">Business Overview</h1>
          
        </div>
        <div class="input-icon-start position-relative mb-3">
            <span class="input-icon-addon fs-16 text-gray-9">
                <i class="ti ti-calendar"></i>
            </span>
            <input type="text" class="form-control date-range bookingrange" placeholder="Search Product">
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4 col-sm-6 col-12 d-flex">
            <div class="card bg-primary sale-widget flex-fill">
                <div class="card-body d-flex align-items-center">
                    <span class="sale-icon bg-white text-danger">
                        <i class="ti ti-arrow-down me-1"></i>
                    </span>
                    <div class="ms-2">
                        <p class="text-white mb-1">To Collect</p>
                        <div class="d-inline-flex align-items-center flex-wrap gap-2">
                            <h4 class="text-white"> ₹ {{ number_format($sales->total_sales_amount, 2) }}</h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 col-12 d-flex">
            <div class="card bg-secondary sale-widget flex-fill">
                <a href="{{ route('stock') }}">
                    <div class="card-body d-flex align-items-center">
                        <span class="sale-icon bg-white text-teal">
                            <i class="ti ti-arrow-up me-1"></i>
                        </span>
                        <div class="ms-2">
                            <p class="text-white mb-1">To Pay</p>
                            <div class="d-inline-flex align-items-center flex-wrap gap-2">
                                <h4 class="text-white">₹ {{ $totalStock }}</h4>
                                {{-- <span class="badge badge-soft-danger"><i class="ti ti-arrow-down me-1"></i>-22%</span> --}}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 col-12 d-flex">
            <div class="card bg-success sale-widget flex-fill">
                <div class="card-body d-flex align-items-center">
                    <span class="sale-icon bg-white text-teal">
                        <i class="ti ti-gift fs-24"></i>
                    </span>
                    <div class="ms-2">
                        <p class="text-white mb-1">Total Cash + Bank Balance</p>
                        <div class="d-inline-flex align-items-center flex-wrap gap-2">
                            <h4 class="text-white">₹ 24,145,789</h4>
                            <span class="badge badge-soft-success"><i class="ti ti-arrow-up me-1"></i>+22%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Recent Transactions -->
        <div class="col-xl-6 col-sm-12 col-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="d-inline-flex align-items-center">
                        <span class="title-icon bg-soft-orange fs-16 me-2"><i class="ti ti-flag"></i></span>
                        <h5 class="card-title mb-0">Latest Transactions</h5>
                    </div>
                    <a href="online-orders.html" class="fs-13 fw-medium text-decoration-underline">View All</a>
                </div>
                <div class="card bg-white">
                 
                   

                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table " id="stock_table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Txn No</th>
                                        <th>Party Name</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Recent Transactions -->
        <!-- Sales Statics -->
        <div class="col-xl-6 col-sm-12 col-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="d-inline-flex align-items-center">
                        <span class="title-icon bg-soft-danger fs-16 me-2"><i class="ti ti-alert-triangle"></i></span>
                        <h5 class="card-title mb-0">Today's Checklist</h5>
                    </div>
                    <div class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle btn btn-sm btn-white" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="ti ti-calendar me-1"></i>2025
                        </a>
                        <ul class="dropdown-menu p-3">
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item">2025</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item">2022</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item">2021</a>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- <div class="card-body pb-0">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="border p-2 br-8">
                            <h5 class="d-inline-flex align-items-center text-teal">$12,189<span
                                    class="badge badge-success badge-xs d-inline-flex align-items-center ms-2"><i
                                        class="ti ti-arrow-up-left me-1"></i>25%</span></h5>
                            <p>Revenue</p>
                        </div>
                        <div class="border p-2 br-8">
                            <h5 class="d-inline-flex align-items-center text-orange">$48,988,078<span
                                    class="badge badge-danger badge-xs d-inline-flex align-items-center ms-2"><i
                                        class="ti ti-arrow-down-right me-1"></i>25%</span></h5>
                            <p>Expense</p>
                        </div>
                    </div>
                    <div id="sales-statistics"></div>
                </div> --}}
            </div>
        </div>
        <!-- /Sales Statics -->



    </div>
@endsection
@section('script')
    <script src="{{ url('assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ url('assets/plugins/sweetalert/sweetalerts.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });
    </script>
    <script></script>
@endsection
