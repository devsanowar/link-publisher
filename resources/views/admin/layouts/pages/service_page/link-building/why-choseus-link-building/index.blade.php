@extends('admin.layouts.app')
@section('title', 'Link Building Packages');
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/bootstrap-select/css/bootstrap-select.css" />
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
                        <h4 class="">Why chose us link builder agency<span><a
                                    href="{{ route('whychose.link_builder.create') }}"
                                    class="btn btn-primary text-white text-uppercase text-bold right">+ Add New
                                </a></span></h4>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Icon</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($whyChoseusLinkBuilders as $key => $whyChoseusLinkBuilder)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $whyChoseusLinkBuilder->icon }}</td>
                                        <td>{{ $whyChoseusLinkBuilder->title }}</td>
                                        <td>{!! Str::limit($whyChoseusLinkBuilder->description, 100) !!}</td>
                                        <td>
                                            <button class="btn btn-sm {{ $whyChoseusLinkBuilder->is_active ? 'btn-success' : 'btn-danger' }} status-toggle-btn"
                                                data-id="{{ $whyChoseusLinkBuilder->id }}">
                                                {{ $whyChoseusLinkBuilder->is_active ? 'Active' : 'Inactive' }}
                                            </button>
                                        </td>
                                        <td>
                                            <a href="{{ route('whychose.link_builder.edit', $whyChoseusLinkBuilder->id) }}"
                                                class="btn btn-warning"><i class="material-icons text-white">edit</i></a>

                                            <form class="deletePackage d-inline-block" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" class="packageId" name="id"
                                                    value="{{ $whyChoseusLinkBuilder->id }}">
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
    <script src="{{ asset('backend') }}/assets/bundles/datatablescripts.bundle.js"></script>

    <!-- Custom Js -->
    <script src="{{ asset('backend') }}/assets/js/pages/tables/jquery-datatable.js"></script>
    <script src="{{ asset('backend') }}/assets/js/sweetalert2.all.min.js"></script>
    

    <script>

        $('.js-exportable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("whychose.link_builder.index") }}',
            columns: [...]
        });


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
