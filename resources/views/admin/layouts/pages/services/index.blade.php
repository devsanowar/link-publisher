@extends('admin.layouts.app')
@section('title', 'All Services')

@push('styles')
    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/sweetalert2.min.css">
@endpush


@section('admin_content')


    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4> All Services<span><a href="{{ route('services.create') }}"
                                    class="btn btn-primary text-white text-uppercase text-bold right">
                                    + Add Service
                                </a></span></h4>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Icon</th>
                                    <th>Service Title</th>
                                    <th>Url</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($services as $key => $service)
                                    <tr data-id="{{ $service->id }}">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $service->icon }}</td>
                                        <td>{{ $service->title }}</td>
                                        <td>{{ $service->url }}</td>

                                        <td>

                                            <!-- Trigger Button -->
                                            <!-- Edit Button -->
                                            <a href="#" class="btn btn-warning btn-sm editServiceBtn"
                                                data-id="{{ $service->id }}" data-title="{{ $service->title }}"
                                                data-icon="{{ $service->icon }}" data-url="{{ $service->url }}">
                                                <i class="material-icons text-white">edit</i>
                                            </a>
                                            <!-- Hidden ID input -->
                                            <input type="hidden" name="id" id="service_id">


                                            <form class="d-inline-block" action="{{ route('services.destroy', $service->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm show_confirm"><i
                                                        class="material-icons">delete</i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        @include('admin.layouts.pages.services.edit')
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
    <!-- Jquery DataTable Plugin Js -->
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



    <script>
        $('.show_confirm').click(function(event) {
            let form = $(this).closest('form');
            event.preventDefault();

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
                    form.submit();
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                }
            });

        });
    </script>

    <script>
        $(document).ready(function() {

            // Modal Open & Fill Data
            $(document).on("click", ".editServiceBtn", function(e) {
                e.preventDefault();

                let row = $(this).closest("tr");
                let id = row.data("id");
                let icon = row.find("td:eq(1)").text().trim();
                let title = row.find("td:eq(2)").text().trim();
                let url = row.find("td:eq(3)").text().trim();

                $("#service_id").val(id);
                $("#icon").val(icon);
                $("#title").val(title);
                $("#url").val(url);

                $("#serviceEditModal").modal("show");
            });

            // Update Form Submit
            $("#serviceUpdateForm").submit(function(e) {
                e.preventDefault();

                let serviceId = $("#service_id").val();
                let formData = new FormData(this);

                $.ajax({
                    url: "/admin/home-page/services/update/" + serviceId, // id route এ পাঠানো হচ্ছে
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $("#serviceUpdateForm")[0].reset();
                        $("#serviceEditModal").modal('hide');
                        toastr.success(response.message);

                        // Table Real-time Update
                        let row = $("tr[data-id='" + serviceId + "']");
                        row.find("td:eq(1)").text(response.data.icon);
                        row.find("td:eq(2)").text(response.data.title);
                        row.find("td:eq(3)").text(response.data.url);
                    },
                    error: function(xhr) {
                        toastr.error('Something went wrong!');
                    }
                });
            });
        });
    </script>
@endpush
