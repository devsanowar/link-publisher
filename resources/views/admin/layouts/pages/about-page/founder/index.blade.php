@extends('admin.layouts.app')
@section('title', 'Founder')
@push('styles')
<link rel="stylesheet" href="{{ asset('backend') }}/assets/css/sweetalert2.min.css">
@endpush
@section('admin_content')
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-2">
                <div>
                    <h4 class="text-center mb-0">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('company.story.index') }}"
                                class="btn btn-primary text-white text-uppercase font-weight-bold mx-2">
                                + Our Story
                            </a>
                            <a href="{{ route('about_page.cta.index') }}"
                                class="btn btn-primary text-white text-uppercase font-weight-bold mx-2">
                                + Add CTA
                            </a>
                            <a href="{{ route('founder.create') }}"
                                class="btn btn-primary text-white text-uppercase font-weight-bold mx-2">
                                + Add Founder
                            </a>
                        </div>
                    </h4>
                </div>
            </div>
        </div>


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
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Founder Name</th>
                                    <th>Designation</th>
                                    <th>Social Icon</th>
                                    <th>Social Url</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                

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
@endpush
