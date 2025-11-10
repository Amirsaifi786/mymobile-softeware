@extends('Layouts.app')
@section('style')

@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Testimonial</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">Testimonial</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Testimonials List</h4>
                        </div>
                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">

                                    <div class="col-sm-auto">
                                        <div>
                                            <a href="{{ route('testimonial.create') }}" class="btn btn-success add-btn"><i
                                                    class="ri-add-line align-bottom me-1"></i> Add Testimonial </a>

                                        </div>
                                    </div>
                                   
                                </div>

                                 <div class="table-responsive table-card mt-3 mb-1 p-3">
                                    <table id="example" class="display " style="width:100%">
                                        <thead>
                                            <tr>

                                                <th>Id</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th id="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($testimonials as $key=>$item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td> <img class="rounded-circle header-profile-user"
                                                            src="{{ url('public/' . $item->image) }}" alt="Product Image"
                                                            style="height:40px !important;width:40px !important">
                                                    </td>
                                                    <td>{{ $item->name }}</td>
                                                    <td class="action">
                                                        <a href="{{ route('testimonial.edit', $item->id) }}"
                                                            class="btn btn-sm btn-success">Edit</a>
                                                        <button class="btn btn-sm btn-danger remove-item-btn"
                                                            data-id="{{ $item->id }}">
                                                            Delete
                                                        </button>
                                                    </td>
                                                </tr>                                          
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                               
                            </div>
                        </div><!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end col -->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <!-- Add SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).on('click', '.remove-item-btn', function() {
        var id = $(this).data('id');
        var row = $('#row-' + id);

        Swal.fire({
            title: "Are you sure?",
            text: "You won’t be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ url('testimonial') }}/" + id, // DELETE request
                    type: "POST",
                    data: {
                        _method: "DELETE", // Laravel method spoofing
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.status === "success") {
                            row.remove();

                            Swal.fire({
                                icon: "success",
                                title: "Deleted!",
                                text: response.message,
                                timer: 1500,
                                showConfirmButton: false
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "Something went wrong!"
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Error deleting testimonial"
                        });
                    }
                });
            }
        });
    });
</script>

@endsection
