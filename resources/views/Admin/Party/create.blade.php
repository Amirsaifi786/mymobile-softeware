@extends('Layouts.app')
@section('style')
    <style>
        .accordion-button:after {
            content: none;
        }
    </style>
@endsection
@section('content')
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4 class="fw-bold">Add party</h4>
            </div>
        </div>

        <div class="page-btn mt-0">
            <a href="{{ route('subcategory') }}" class="btn btn-secondary"><i data-feather="arrow-left" class="me-2"></i>Back
                to
                party</a>
        </div>
    </div>
    <form action="{{ route('subcategory.store') }}" method="POST" class="add-product-form" enctype="multipart/form-data">
        @csrf
        <div class="add-product">
            <div class="accordions-items-seperate" id="accordionSpacingExample">
                <div class="accordion-item border mb-4">
                    <h2 class="accordion-header">
                        <div class="accordion-button collapsed bg-primary">
                            <div class="d-flex align-items-center justify-content-between flex-fill">
                                <h5 class="d-flex align-items-center text-light"><span>Add party </span></h5>
                            </div>
                        </div>
                    </h2>
                    <div id="SpacingOne" class="accordion-collapse collapse show">
                        <div class="accordion-body border-top">



                            <!-- General Details -->
                            <div class="card p-4">
                                <h6 class="section-title">General Details</h6>
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label class="form-label">Party Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Enter name">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Mobile Number</label>
                                        <input type="text" class="form-control" placeholder="Enter mobile number">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" placeholder="Enter email">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Opening Balance</label>
                                        <div class="input-group">
                                            <span class="input-group-text">₹</span>
                                            <input type="number" class="form-control" placeholder="0">
                                            <select class="form-select">
                                                <option selected>To Collect</option>
                                                <option>To Pay</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">GSTIN</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="ex: 29XXXXX9438">
                                            <button class="btn btn-outline-secondary">Get Details</button>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">PAN Number</label>
                                        <input type="text" class="form-control" placeholder="Enter party PAN">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Party Type<span class="text-danger">*</span></label>
                                        <select class="form-select">
                                            <option>Customer</option>
                                            <option>Supplier</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Party Category</label>
                                        <select class="form-select">
                                            <option>Select Category</option>
                                            <option>Retail</option>
                                            <option>Wholesale</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="card p-4">
                                <h6 class="section-title">Address</h6>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Billing Address</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter billing address"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label class="form-label mb-0">Shipping Address</label>
                                            <div>
                                                <input type="checkbox" id="sameAddress">
                                                <label for="sameAddress" class="small">Same as Billing address</label>
                                            </div>
                                        </div>
                                        <textarea class="form-control" rows="3" placeholder="Enter shipping address"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Credit & Contact Details -->
                            <div class="card p-4">
                                <h6 class="section-title">Credit & Contact Details</h6>
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label class="form-label">Credit Period</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" placeholder="30">
                                            <span class="input-group-text">Days</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Credit Limit</label>
                                        <div class="input-group">
                                            <span class="input-group-text">₹</span>
                                            <input type="number" class="form-control" placeholder="0">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Contact Person Name</label>
                                        <input type="text" class="form-control" placeholder="Ex: Ankit Mishra">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <!-- Party Bank Account -->
                            <div class="card p-4 text-center">
                                <h6 class="section-title">Party Bank Account</h6>
                                <div class="my-4">
                                    <img src="https://cdn-icons-png.flaticon.com/512/2830/2830289.png" alt="bank"
                                        width="50">
                                    <p class="text-muted mt-2 mb-2">Add party bank information to manage transactions</p>
                                    <button class="btn btn-outline-primary btn-sm">+ Add Bank Account</button>
                                </div>
                            </div>

                            <!-- Custom Field -->
                            <div class="card p-4">
                                <h6 class="section-title">Custom Field</h6>
                                <input type="text" class="form-control" placeholder="Enter custom field value">
                            </div>
                        </div>


                    </div>
                </div>


            </div>
        </div>
        <div class="col-lg-12">
            <div class="d-flex align-items-center justify-content-end mb-4">
                {{-- <button type="button" class="btn btn-secondary me-2">Cancel</button> --}}
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
        </div>
    </form>
@endsection
@section('script')
@endsection
