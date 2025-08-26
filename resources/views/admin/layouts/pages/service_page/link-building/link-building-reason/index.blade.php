@extends('admin.layouts.app')
@section('title', 'Link building Reason')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/bootstrap-select/css/bootstrap-select.css" />
@endpush
@section('admin_content')
    <div class="container-fluid">
        @include('admin.layouts.pages.service_page.link-building.link-building-menu')

        <!-- Horizontal Layout -->
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="">Link Building Reason
                        </h4>
                    </div>
                    <div class="body">
                        <form id="updateLinkBuilderReasonForm">
                            @csrf

                            <input type="hidden" name="id" value="{{ $linkBuildReason->id ?? '' }}">
                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="title"><b>Section Title</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="title" name="title" class="form-control"
                                            placeholder="Enter section title " value="{{ $linkBuildReason->title ?? '' }}">
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="description"><b>Description</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <textarea name="description" rows="4" class="form-control">{!! $linkBuildReason->description ?? '' !!}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="image"><b>Image</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="file" id="image" name="image" class="form-control"
                                            placeholder="Uplaod image">
                                    </div>
                                    <img id="linkBuildingReasonImagePreview"
                                        src="{{ asset($linkBuildReason->image ?? '') }}"
                                        alt="{{ $linkBuildReason->title ?? '' }}" width="50" class="mt-2">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7">
                                <button type="submit"
                                    class="btn btn-raised btn-primary m-t-15 waves-effect">UPDATE</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="">Why Hire a Link Building Company?
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#linkBuildingReasonModal">
                                Add New
                            </button>
                        </h4>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reasons as $index => $reason)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $reason->title }}</td>
                                        <td>{!! Str::limit($reason->description, 20, '...') !!}</td>
                                        <td>
                                            <button data-id="{{ $reason->id }}"
                                                class="btn btn-sm status-toggle-btn {{ $reason->is_active ? 'btn-success' : 'btn-danger' }}">
                                                {{ $reason->is_active ? 'Active' : 'Inactive' }}
                                            </button>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" data-id="{{ $reason->id }}"
                                                class="btn btn-warning btn-sm editReasonBtn">
                                                <i class="material-icons text-white">edit</i>
                                            </a>


                                            <form class="deleteWhychoseLinkBuilding d-inline-block" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" class="linkBuildReasonID" name="id"
                                                    value="{{ $reason->id }}">
                                                <button type="submit" class="btn btn-danger btn-sm show_confirm">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @include('admin.layouts.pages.service_page.link-building.link-building-reason.create')
            @include('admin.layouts.pages.service_page.link-building.link-building-reason.edit')

        </div>

    </div>

@endsection
@push('scripts')
    <script src="{{ asset('backend') }}/assets/bundles/datatablescripts.bundle.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>


    <!-- Custom Js -->
    <script src="{{ asset('backend') }}/assets/js/pages/tables/jquery-datatable.js"></script>
    <script src="{{ asset('backend') }}/assets/js/sweetalert2.all.min.js"></script>


    <!-- Update about Link building Form Update form -->
    <script>
        $(document).ready(function() {
            $("#updateLinkBuilderReasonForm").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('link.building.reason.update') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        toastr.options = {
                            timeOut: 1500,
                            extendedTimeOut: 1000,
                            closeButton: true,
                            progressBar: true,
                            positionClass: 'toast-top-right'
                        };
                        toastr.success(response.message);

                        if (response.image_path) {
                            $("#linkBuildingReasonImagePreview").attr("src", response
                                .image_path);
                        }

                    },
                    error: function({
                        responseJSON
                    }) {
                        toastr.error(responseJSON?.message || 'Something went wrong!');
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {


            $(document).on("click", ".editReasonBtn", function() {
                let id = $(this).data("id");

                $.get("/admin/services/link-building/link-building-reason/feature/" + id, function(data) {
                    $("#edit_id").val(data.id);
                    $("#edit_title").val(data.title);
                    $("#edit_description").val(data.description);
                    $("#edit_is_active").val(data.is_active).change();

                    $("#editLinkBuildingReasonModal").modal("show");
                });
            });


            $("#editLinkBuildingReasonForm").on("submit", function(e) {
                e.preventDefault();

                let id = $("#edit_id").val();
                let formData = {
                    _token: $("input[name=_token]").val(),
                    title: $("#edit_title").val(),
                    description: $("#edit_description").val(),
                    is_active: $("#edit_is_active").val()
                };

                $.ajax({
                    url: "/admin/services/link-building/link-building-reason/feature/" + id +
                        "/update",
                    type: "PUT",
                    data: formData,
                    success: function(response) {
                        $("#editLinkBuildingReasonModal").modal("hide");
                        
                        location.reload();
                        
                        toastr.options = {
                            timeOut: 1500,
                            extendedTimeOut: 1000,
                            closeButton: true,
                            progressBar: true,
                            positionClass: 'toast-top-right'
                        };
                        toastr.success(response.message);
                        
                        
                    },
                    error: function(err) {
                        console.log(err);
                        alert("Update failed!");
                    }
                });

            });

        });
    </script>


<script>
$(document).ready(function () {

    $('.show_confirm').click(function(e){
        e.preventDefault();

        let form = $(this).closest('form');
        let linkBuildReasonId = form.find('.linkBuildReasonID').val(); // hidden input থেকে id নাও

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                // AJAX call
                $.ajax({
                    url: "{{ route('link-building-reason.destroy') }}",
                    type: "DELETE",
                    data: {
                        id: linkBuildReasonId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        toastr.options = {
                            timeOut: 1500,
                            extendedTimeOut: 1000,
                            closeButton: true,
                            progressBar: true,
                            positionClass: 'toast-top-right'
                        };
                        toastr.success(response.message);

                        // Row remove
                        form.closest('tr').remove();
                    },
                    error: function ({ responseJSON }) {
                        toastr.error(responseJSON?.message || 'Something went wrong!');
                    }
                });
            }
        });

    });

});
</script>
@endpush
