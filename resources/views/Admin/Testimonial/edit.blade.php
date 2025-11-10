@extends('Layouts.app')
@section('style')
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Testimonial Edit</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Testimonial Edit</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                          <div class="card-header">
                            <h4 class="card-title mb-0">Testimonial Edit</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="live-preview">
                                <form action="{{ route('testimonial.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row gy-4">
                                        <input type="hidden" name="id" value="{{ $testimonial->id }}">
                                        <div class="col-xxl-3 col-md-6">
                                            <label>Name</label>
                                            <input type="text" name="name"
                                                value="{{ old('name', $testimonial->name) }}"
                                                class="form-control @error('name') is-invalid @enderror">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-xxl-3 col-md-6">
                                            <label>Designation</label>
                                            <input type="text" name="designation"
                                                value="{{ old('designation', $testimonial->designation) }}"
                                                class="form-control @error('designation') is-invalid @enderror">
                                            @error('designation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-xxl-3 col-md-6">
                                            <label>Company </label>
                                            <input type="text" name="company"
                                                value="{{ old('company', $testimonial->company) }}"
                                                class="form-control @error('company') is-invalid @enderror">
                                            @error('company')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>



                                        <div class="col-xxl-6 col-md-6">
                                            <div>
                                                <label for="message" class="form-label">Message</label>
                                                <textarea name="message" class="form-control " rows="10" placeholder="Enter page content here">{{ old('message', $testimonial->message) }}</textarea>
                                                @error('message')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-xxl-3 col-md-6">
                                            <label>Image</label><br>

                                            <input type="file" name="image"
                                                class="form-control  @error('image') is-invalid @enderror mt-2">
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-xxl-3 col-md-6">
                                            <img src="{{ url('public/' . $testimonial->image) ? url('public/' . $testimonial->image) : asset('assets/images/noimage.png') }}"
                                                width="60" height="60">
                                        </div>
                                        <div class="col-xxl-12 col-md-12 text-center">
                                            <button type="submit" class="col-mb-2 btn btn-primary">Update Testimonial</button>
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
