@extends('Layouts.app')
@section('style')
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Testimonial Create</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">Testimonial Create</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                              <div class="card-header">
                            <h4 class="card-title mb-0">Testimonial Create</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="live-preview">
                                <form action="{{ route('testimonial.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row gy-4">

                                        <!-- Name -->
                                        <div class="col-xxl-3 col-md-6">
                                            <div>
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    id="name" value="{{ old('name') }}">
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-xxl-3 col-md-6">
                                            <div>
                                                <label for="designation" class="form-label">Designation</label>
                                                <input type="text"
                                                    class="form-control @error('designation') is-invalid @enderror"
                                                    name="designation" id="designation" value="{{ old('designation') }}">
                                                @error('rating')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-md-6">
                                            <div>
                                                <label for="company" class="form-label">Company</label>
                                                <input type="text"
                                                    class="form-control @error('company') is-invalid @enderror"
                                                    name="company" id="company" value="{{ old('company') }}">
                                                @error('rating')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Image -->
                                        <div class="col-xxl-3 col-md-6">
                                            <div>
                                                <label for="image" class="form-label">Image</label>
                                                <input type="file"
                                                    class="form-control @error('image') is-invalid @enderror" name="image"
                                                    id="image">
                                                @error('image')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-xxl-12 col-md-6">
                                            <div>
                                                <label for="message" class="form-label">Message</label>                                        
                                                <textarea name="message"  class="form-control " rows="10"
                                                    placeholder="Enter page content here">{{ old('message') }}</textarea>
                                                @error('message')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Submit -->
                                        <div class="hstack flex-wrap gap-2">
                                            <button type="submit"
                                                class="btn btn-primary btn-animation waves-effect waves-light"
                                                data-text="Save">
                                                <span>Save Testimonial</span>
                                            </button>
                                        </div>

                                    </div>
                                </form>


                            </div>

                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
