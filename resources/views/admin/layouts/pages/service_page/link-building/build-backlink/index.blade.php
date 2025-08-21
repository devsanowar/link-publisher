@extends('admin.layouts.app')
@section('title', 'Edit how do we build Backlinks')
@push('styles')

    <style>
        .input-group {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
        }

        .input-group input {
            flex: 1;
            padding: 6px;
            border: 1px solid #ccc;
            /* Border always show */
            border-radius: 4px;
        }

        .input-group button {
            margin-left: 6px;
            padding: 9px 12px;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .input-group button:hover {
            background: #0056b3;
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
                        <h4 class="">How do we build backlinks</h4>
                    </div>
                    <div class="body">
                        <form id="BuildBacklinkFormUpdate" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $buildBacklink->id ?? '' }}">
                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="title"><b>Title</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="title" name="title" class="form-control"
                                            placeholder="Enter Title " value="{{ $buildBacklink->title ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="description"><b>Description</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <textarea name="description" id="ckeditor" class="form-control">{!! $buildBacklink->description ?? '' !!}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="image"><b>Image (Max size: 500kb)</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                    @if (!empty($buildBacklink->image))
                                        <img src="{{ asset($buildBacklink->image) }}" alt="Backlink Image" width="40" class="mt-2">
                                    @endif
                                </div>
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7">
                                <button type="submit"
                                    class="btn btn-raised btn-primary m-t-15 waves-effect">UPDATE</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>


        </div>

    </div>
@endsection

@push('scripts')
    <script src="{{ asset('backend') }}/assets/plugins/ckeditor/ckeditor.js"></script> <!-- Ckeditor -->
    <script src="{{ asset('backend') }}/assets/js/pages/forms/editors.js"></script>

    <!-- Update about Link building Form Update form -->
    <script>
        $(document).ready(function() {
            $('#BuildBacklinkFormUpdate').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: "{{ route('build.backlink.update') }}",
                    data: formData,
                    processData:false,
                    contentType:false,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
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
