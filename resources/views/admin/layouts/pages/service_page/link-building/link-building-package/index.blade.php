@extends('admin.layouts.app')
@section('title', 'Link Building Packages');
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/sweetalert2.min.css">
    <style>
        .btn {
            padding: .375rem .50rem;
        }
    </style>
@endpush
@section('admin_content')
    <div class="container-fluid">
        @include('admin.layouts.pages.service_page.link-building.link-building-menu')

        <!-- Horizontal Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="">Link building packages<span><a href="{{ route('link_building.packages.create') }}"
                                    class="btn btn-primary text-white text-uppercase text-bold right"> Create Packages
                                </a></span></h4>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Package Type</th>
                                    <th>Price</th>
                                    <th>Button text</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($packages as $key => $package)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ ucfirst($package->package_type) }}</td>
                                        <td>{{ $package->price }}</td>
                                        <td>{{ $package->button_text }}</td>
                                        <td>

                                            <button data-id="{{ $package->id }}"
                                                class="btn btn-sm status-toggle-btn {{ $package->is_active ? 'btn-success' : 'btn-danger' }}">
                                                {{ $package->is_active ? 'Active' : 'DeActive' }}
                                            </button>
                                        </td>
                                        <td>
                                            <a href="{{ route('link_building.packages.edit', $package->id) }}"
                                                class="btn btn-warning"><i class="material-icons text-white">edit</i></a>

                                            <form class="deletePackage d-inline-block" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" class="packageId" name="id"
                                                    value="{{ $package->id }}">
                                                <button type="submit" class="btn btn-danger show_confirm">
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
    <script src="{{ asset('backend') }}/assets/js/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {

            $('.show_confirm').click(function(e) {
                e.preventDefault();

                let form = $(this).closest('form');
                let packageId = form.find('.packageId').val();

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
                            url: "{{ route('link_building.packages.destroy') }}",
                            type: "DELETE",
                            data: {
                                id: packageId,
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
    </script>

    <script>
        // Status change functionality
        $(document).on('click', '.status-toggle-btn', function(e) {
            e.preventDefault();

            let button = $(this);
            let packageId = button.data('id');

            $.ajax({
                url: "{{ route('package.status') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: packageId
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
