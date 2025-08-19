@extends('admin.layouts.app')
@section('title', 'Founder')
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
                        <h4 class="">Founder<span><a href="{{ route('founder.create') }}"
                                    class="btn btn-primary text-white text-uppercase text-bold right">
                                    + Add Founder
                                </a></span< /h4>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Founder Name</th>
                                    <th>Designation</th>
                                    <th>Social Icon</th>
                                    <th>Social Url</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($founders as $index => $founder)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td><img src="{{ asset($founder->image) }}" alt="Founder Image" width="30"></td>
                                    <td>{{ $founder->name }}</td>
                                    <td>{{ $founder->designation }}</td>
                                    <td>{{ $founder->social_icon }}</td>
                                    <td>{{ $founder->social_url }}</td>
                                    <td>

                                    <a href="{{ route('founder.edit', $founder->id) }}" class="btn btn-warning btn-sm"> <i class="material-icons text-white">edit</i></a>


                                    <form class="deleteFounder d-inline-block" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" class="founderID" name="id" value="{{ $founder->id }}">
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
$(document).ready(function () {

    $('.show_confirm').click(function(e){
        e.preventDefault();

        let form = $(this).closest('form');
        let founderId = form.find('.founderID').val(); // hidden input থেকে id নাও

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
                    url: "{{ route('founder.destroy') }}",
                    type: "DELETE",
                    data: {
                        id: founderId,
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
