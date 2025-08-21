@extends('admin.layouts.app')
@section('title', 'Create Link Building Process')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/bootstrap-select/css/bootstrap-select.css" />
    <style>
        .case-input {
            border: 1px solid #ccc;
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
                        <h4 class="">Create Link building Process<span><a
                                    href="{{ route('link.building.process.index') }}"
                                    class="btn btn-primary text-white text-uppercase text-bold right"> All link building
                                    process </a></span></h4>
                    </div>
                    <div class="body">
                        <form id="storeLinkBuildingProcess">
                            @csrf

                            <div class="form-group mb-4">
                                <label for="title"><b>Title</b></label>
                                <div class="input-group">
                                    <div class="form-line case-input">
                                        <input type="text" class="form-control" name="title" id="title"
                                            placeholder="Enter Title" style="padding-left:10px;">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group mb-4">
                                <label for="description"><b>Description</b></label>
                                <div class="input-group">
                                    <div class="form-line">
                                        <textarea type="text" class="form-control" name="description" rows="5" id="description"
                                            style="border:1px solid #ccc"> </textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label><b>Status</b></label>
                                <select class="form-control show-tick" name="is_active">
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                                <div class="text-danger font-weight-bold mt-2" id="statusError"></div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary text-white text-uppercase">Save</button>
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
        // Store data functionality
        $(document).ready(function() {
            $("#storeLinkBuildingProcess").submit(function(e) {
                e.preventDefault();

                let formData = $(this).serialize();

                $.ajax( {
                    url: "{{ route('link.building.process.store') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        $('#storeLinkBuildingProcess')[0].reset();
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
