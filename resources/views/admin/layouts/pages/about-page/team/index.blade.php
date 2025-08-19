@extends('admin.layouts.app')
@section('title', 'Team Member')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/sweetalert2.min.css">
@endpush
@section('admin_content')
    <div class="container-fluid">
        @include('admin.layouts.pages.about-page.about-menu')

        <!-- Horizontal Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="">Team Members<span><a href="{{ route('team.create') }}"
                                    class="btn btn-primary text-white text-uppercase text-bold right">
                                    + Add team members
                                </a></span< /h4>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $index => $team)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td><img src="{{ asset($team->image) }}" alt="Team Image" width="30"></td>
                                        <td>{{ $team->name }}</td>
                                        <td>{{ $team->designation }}</td>
                                        <td>
                                            <button data-id="{{ $team->id }}"
                                                class="btn btn-sm status-toggle-btn {{ $team->status ? 'btn-success' : 'btn-danger' }}">
                                                {{ $team->status ? 'Active' : 'DeActive' }}
                                            </button>
                                        </td>
                                        <td>

                                            <a href="{{ route('team.edit', $team->id) }}" class="btn btn-warning btn-sm">
                                                <i class="material-icons text-white">edit</i></a>


                                            <form class="deleteFounder d-inline-block" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" class="teamId" name="id"
                                                    value="{{ $team->id }}">
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
        $(document).ready(function() {

            $('.show_confirm').click(function(e) {
                e.preventDefault();

                let form = $(this).closest('form');
                let teamId = form.find('.teamId').val(); // hidden input থেকে id নাও

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
                            url: "{{ route('team.destroy') }}",
                            type: "DELETE",
                            data: {
                                id: teamId,
                                _token: '{{ csrf_token() }}'
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

                                // Row remove
                                form.closest('tr').remove();
                            },
                            error: function({
                                responseJSON
                            }) {
                                toastr.error(responseJSON?.message ||
                                    'Something went wrong!');
                            }
                        });
                    }
                });

            });

        });


        // status change
        $(document).on('click', '.status-toggle-btn', function(e) {
            e.preventDefault();

            let button = $(this);
            let teamId = button.data('id');

            $.ajax({
                url: "{{ route('team.status') }}",
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
