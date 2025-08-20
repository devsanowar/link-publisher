@extends('admin.layouts.app')
@section('title', 'Create Why chose us link building package')
@push('styles')
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
                        <h4 class="">add Why chose us link building package<span><a href="{{ route('whychose.link_builder.index') }}" class="btn btn-primary text-white text-uppercase text-bold right"> All Items </a></span></h4>
                    </div>
                    <div class="body">
                        <form id="addWhychoseLinkBuilder" class="form-horizontal" method="POST">
                            @csrf


                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="icon"><b>Icon Class</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="icon" name="icon"
                                            class="form-control" placeholder="Enter Icon class">
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="title"><b>Title</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="title" name="title" class="form-control"
                                            placeholder="Enter Title">
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="description"><b>Description</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>

                            </div>



                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="video_url"><b>Status</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <select name="is_active" id="" class="form-control show-tick">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7">
                                <button type="submit"
                                    class="btn btn-raised btn-primary m-t-15 waves-effect">SAVE</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>


        </div>

    </div>
@endsection

@push('scripts')

    <script>
        $(document).ready(function() {
            $('#addWhychoseLinkBuilder').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('whychose.link_builder.store') }}",
                    data: formData,
                    success: function(response) {
                        $('#addWhychoseLinkBuilder')[0].reset();
                        if (response.status === 'success') {
                            toastr.success(response.message);
                        } else {
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            toastr.error(value[0]);
                        });
                    }
                });
            });
        });
    </script>
@endpush
