@extends('admin.layouts.app')
@section('title', 'Visitors')

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
                        <h4>
                            Visitor Logs

                        </h4>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>IP Address</th>
                                    <th>Browser</th>
                                    <th>User Agent</th>
                                    <th>Visited At</th>
                                    <th>Left At</th>
                                    <th>Duration (seconds)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($visitors as $visitor)
                                    <tr>
                                        <td>{{ $visitor->id }}</td>
                                        <td>{{ $visitor->ip_address }}</td>
                                        <td>{{ $visitor->browser }}</td>
                                        <td>{{ $visitor->user_agent }}</td>
                                        <td>{{ $visitor->visited_at }}</td>
                                        <td>{{ $visitor->left_at ?? 'Still Browsing' }}</td>
                                        <td>{{ $visitor->duration_seconds ?? '-' }}</td>
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
