@extends('admin.layouts.app')
@section('title', 'Link building Proccess')
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
            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="">Link Building Process
                            <span>
                                <!-- Button to trigger modal -->
                                <a href="{{ route('link.building.process.create') }}"
                                    class="btn btn-primary text-white text-uppercase text-bold right"> Create Link
                                    building Process </a>
                            </span>
                        </h4>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($linkBuildingProcesses as $index => $linkBuildingProcess)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $linkBuildingProcess->title }}</td>
                                    <td>{!! Str::limit($linkBuildingProcess->description, 100, '...') !!}</td>
                                    <td>
                                       <button data-id="{{ $linkBuildingProcess->id }}"
                                            class="btn btn-sm status-toggle-btn {{ $linkBuildingProcess->is_active ? 'btn-success' : 'btn-danger' }}">
                                            {{ $linkBuildingProcess->is_active ? 'Active' : 'DeActive' }}
                                        </button> 
                                    </td>

                                    <td>
                                    <a href="{{ route('link.building.process.edit', $linkBuildingProcess->id) }}" class="btn btn-warning btn-sm"> <i class="material-icons text-white">edit</i></a>


                                    <form class="deleteFounder d-inline-block" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" class="linkProcessID" name="id" value="{{ $linkBuildingProcess->id }}">
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


// link building process delete functionality
$(document).ready(function () {

    $('.show_confirm').click(function(e){
        e.preventDefault();

        let form = $(this).closest('form');
        let linkProcessId = form.find('.linkProcessID').val(); // hidden input থেকে id নাও

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
                    url: "{{ route('link.building.process.destroy') }}",
                    type: "DELETE",
                    data: {
                        id: linkProcessId,
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

// Status toggle functionality
$(document).on('click', '.status-toggle-btn', function(e) {
            e.preventDefault();

            let button = $(this);
            let teamId = button.data('id');

            $.ajax({
                url: "{{ route('link.building.process.status') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: teamId
                },
                success: function(response) {
                    if (response.status) {
                        button.text(response.new_status);
                        button.removeClass('btn-success btn-danger').addClass(response.class);
                        toastr.success(response.message, 'Success', {
                            timeOut: 1500,
                            closeButton: true,
                            progressBar: true
                        });
                    } else {
                        toastr.error(response.message, 'Error');
                    }
                },
                error: function(xhr) {
                    alert('Something went wrong!');
                }
            });
        });
</script>


@endpush
