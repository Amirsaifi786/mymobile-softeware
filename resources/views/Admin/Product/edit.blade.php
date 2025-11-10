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
                <h4 class="fw-bold">Edit Product</h4>
            </div>
        </div>
        <ul class="table-top-head">
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i class="ti ti-refresh"></i></a>
            </li>
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                        class="ti ti-chevron-up"></i></a>
            </li>
        </ul>
        <div class="page-btn mt-0">
            <a href="{{ route('product') }}" class="btn btn-secondary"><i data-feather="arrow-left" class="me-2"></i>Back
                to
                Product</a>
        </div>
    </div>
    <form action="{{ route('product.update') }}" method="POST" class="add-product-form" enctype="multipart/form-data">
        @csrf
        <div class="add-product">
            <div class="accordions-items-seperate" id="accordionSpacingExample">
                <div class="accordion-item border mb-4">
                    <h2 class="accordion-header">
                        <div class="accordion-button collapsed bg-primary">
                            <div class="d-flex align-items-center justify-content-between flex-fill">
                                <h5 class="d-flex align-items-center text-light"><span>Edit Product</span></h5>
                            </div>
                        </div>
                    </h2>
                    <div id="SpacingOne" class="accordion-collapse collapse show">
                        <div class="accordion-body border-top">
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Name<span
                                                class="text-danger ms-1">*</span></label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ old('name', $product->name) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Category<span class="text-danger ms-1">*</span></label>
                                        <select class="select" name="category_id" id="category_id">
                                            <option>Select</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Sub Category<span
                                                class="text-danger ms-1">*</span></label>
                                        <select class="select"name="subcategory_id" id="subcategory_id">
                                            <option>Choose Sub Category</option>
                                            @foreach ($subcategories as $subcat)
                                                <option value="{{ $subcat->id }}"{{ old('subcategory_id', $product->subcategory_id) == $subcat->id ? 'selected' : '' }}>
                                                    {{ $subcat->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label"> Product Type<span
                                                class="text-danger ms-1">*</span></label>
                                        <select class="select" name="producttype_id" id="producttype_id">
                                            <option>Choose Product Type</option>
                                            @foreach ($producttypes as $ptype)
                                                <option value="{{ $ptype->id }}"
                                                    {{ old('producttype_id', $product->producttype_id) == $ptype->id ? 'selected' : '' }}>
                                                    {{ $ptype->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Brand<span class="text-danger ms-1">*</span></label>
                                        <select class="select"name="brand_id" id="brand_id">
                                            <option>Choose Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}"
                                                    {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>
                                                    {{ $brand->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Mrp<span class="text-danger ms-1">*</span></label>
                                        <input type="text" class="form-control"name="mrp" id="mrp"
                                            value="{{ old('mrp', $product->mrp) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Sell price<span class="text-danger ms-1">*</span></label>
                                        <input type="text" class="form-control" name="sellprice" id="sellprice"
                                            value="{{ old('sellprice', $product->sellprice) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                              {{--   <div class="col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Stock<span class="text-danger ms-1">*</span></label>
                                        <input type="text" class="form-control" name="stock" id="stock"
                                            value="{{ old('stock', $product->stock) }} ">
                                    </div>
                                </div> --}}
                                <div class="col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Guarantee<span class="text-danger ms-1">*</span></label>
                                        <select class="select" name="guarantee" id="guarantee">
                                            <option>Select</option>
                                            <option value="none"
                                                {{ old('guarantee', $product->guarantee) == 'none' ? 'selected' : '' }}>
                                                None</option>
                                                  <option value="1"
                                                {{ old('guarantee', $product->guarantee) == '1' ? 'selected' : '' }}>
                                                1 Months</option>
                                            <option value="3months"
                                                {{ old('guarantee', $product->guarantee) == '3' ? 'selected' : '' }}>
                                                3 Months</option>
                                            <option value="6months"
                                                {{ old('guarantee', $product->guarantee) == '6' ? 'selected' : '' }}>
                                                6 Months</option>
                                            <option value="12months"
                                                {{ old('guarantee', $product->guarantee) == '12' ? 'selected' : '' }}>
                                                12 Months</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    {{-- <div class="summer-description-box">
                                        <label class="form-label">Description</label>
                                        <div class="editor pages-editor">{!! old('description', $product->description) !!}
                                        </div>
                                    </div> --}}
                                    <label for="description" class="form-label">Description</label>
                                    <textarea id="my-editor" name="description" class="form-control ckeditor" rows="10"
                                        placeholder="Enter product description">{!! old('description', $product->description) !!}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-12">
                                    <div class="mb-4 mt-4">
                                        <div class="text-editor add-list add">
                                            <div class="col-lg-12">
                                                <div class="add-choosen">
                                                    <div class="mb-3">
                                                        <div class="image-upload image-upload-two">
                                                            <input type="file" name="image" id="image">
                                                            <div class="image-uploads">
                                                                <i data-feather="plus-circle"
                                                                    class="plus-down-add me-0"></i>
                                                                <h4>Edit Images</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="phone-img">
                                                        <img src="{{ url('public/uploads/products/' . $product->image) ? url('public/uploads/products/' . $product->image) : asset('assets/images/noimage.png') }}"
                                                            alt="image">
                                                        <a href="javascript:void(0);"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-x x-square-add remove-product">
                                                            </svg></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-12">
                                    <div class="mb-4 mt-4">
                                        <label class="form-label">Status</label>

                                        <div class="form-check form-check-lg form-switch">
                                            <input class="form-check-input" type="checkbox" name="status"
                                                role="switch" id="switch-lg"
                                                value="{{ old('status', $product->status ?? 0) == 1 ? '1' : '0' }}"
                                                {{ old('status', $product->status ?? 0) == 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="switch-lg">Active/Inactive</label>
                                        </div>
                                    </div>
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
    </form>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#category_id').on('change', function() {
                var category_id = $(this).val();

                if (category_id) {
                    $.ajax({
                        url: "{{ route('getSubcategories') }}", 
                        type: "GET",
                        data: {
                            category_id: category_id
                        },
                        success: function(response) {
                            $('#subcategory_id').empty().append(
                                '<option value=""> Sub Category</option>');
                            $.each(response, function(key, value) {
                                $('#subcategory_id').append('<option value="' + value
                                    .id + '">' + value.name + '</option>');
                            });
                        },
                        error: function() {
                            alert('Error fetching subcategories!');
                        }
                    });
                } else {
                    $('#subcategory_id').empty().append('<option value="">Select Sub Category</option>');
                }
            });
        });
    </script>
@endsection
