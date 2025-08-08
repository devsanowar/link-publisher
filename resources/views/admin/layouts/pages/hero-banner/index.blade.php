@extends('admin.layouts.app')
@section('title')
    Banner
@endsection
@push('styles')
    <style>
        .form-group .form-control {
            padding-left: 10px;
        }

        .file-input-row input[type="file"] {
            flex: 1;
        }

        .file-input-row {
            display: flex;
            gap: 10px;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .remove-btn {
            white-space: nowrap;
        }
    </style>
@endpush

@section('admin_content')
    <div class="container-fluid">
        <!-- Horizontal Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-uppercase"> Banner Data Update</h4>

                    </div>
                    <div class="body">
                        <form id="heroBannerForm" enctype="multipart/form-data">
                            @csrf

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="title"><b>Banner Title</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="title" name="title" class="form-control"
                                            placeholder="Enter website title "
                                            value="{{ $banner->title ?? 'No title available' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="sub_title"><b>Sub Title</b></label>
                                <div class="form-group">
                                    <div class="mb-2" style="border: 1px solid #ccc">
                                        <input type="text" class="form-control" name="sub_title" id="sub_title"
                                            value="{{ $banner->sub_title ?? 'No sub title available' }}"
                                            placeholder="Enter sub title" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="description"><b>Description</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <textarea type="text" id="description" name="description" class="form-control" rows="4">{!! $banner->description ?? 'No description available' !!}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="interested_in"><b>Interested</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="interested_in" name="interested_in" class="form-control"
                                            placeholder="Enter Why interested in "
                                            value="{{ $banner->title ?? 'Not available' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row pl-3 pr-3">
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="button_one_name"><b>Button One Name</b></label>
                                    <div class="form-group" style="border: 1px solid #ccc">
                                        <input type="text" name="button_one_name" id="button_one_name"
                                            class="form-control" placeholder="Enter button name"
                                            value="{{ $banner->button_one_name ?? 'No button name available' }}">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="button_one_url"><b>Button One URL</b></label>
                                    <div class="form-group" style="border: 1px solid #ccc">
                                        <input type="text" name="button_one_url" id="button_one_url" class="form-control"
                                            placeholder="Enter button URL"
                                            value="{{ $banner->button_one_url ?? 'Button URL not available' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row pl-3 pr-3">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-7 mb-3">
                                    <label for="button_two_name"><b>Button Two Name</b></label>
                                    <div class="form-group">
                                        <div class="" style="border: 1px solid #ccc">
                                            <input type="text" name="button_two_name" id="button_two_name"
                                                class="form-control" placeholder="Enter button name"
                                                value="{{ $banner->button_two_name ?? 'No button name available' }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-7 mb-3">
                                    <label for="button_two_url"><b>Button two URL</b></label>
                                    <div class="form-group">
                                        <div class="" style="border: 1px solid #ccc">
                                            <input type="text" name="button_two_url" id="button_two_url"
                                                class="form-control" placeholder="Enter button url"
                                                value="{{ $banner->button_two_url ?? 'Button url not available' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="guarantee_text"><b>Guarantee text</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" name="guarantee_text" id="guarantee_text"
                                            class="form-control" placeholder="Enter button url"
                                            value="{{ $banner->guarantee_text ?? 'Guarantee text not available' }}">
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="customFile"><b>Image</b></label>
                                <div class="form-group">
                                    <div id="file-input-container">
                                        <div class="file-input-row d-flex align-items-center mb-2 border rounded">
                                            <input type="file" name="files[]" class="form-control me-2">
                                            <button type="button" class="btn btn-danger btn-sm remove-btn"
                                                onclick="removeFileInput(this)">Remove</button>
                                        </div>
                                    </div>
                                    <button type="button" id="add-file-btn" class="btn btn-danger mt-2">Add More
                                        Files</button>
                                </div>

                                <div id="existing-files">
                                    @php
                                        $existingFiles = json_decode($banner->files ?? '[]', true);
                                    @endphp
                                    @foreach ($existingFiles as $file)
                                        <div class="file-input-row d-flex align-items-center mb-2 border rounded">
                                            <input type="hidden" name="old_files[]" id="files"
                                                value="{{ $file }}">
                                            <img src="{{ asset($file) }}" alt="File" width="80" height="80"
                                                class="me-2">
                                            <button type="button" class="btn btn-danger btn-sm remove-btn"
                                                onclick="removeExistingFile(this)">Remove</button>
                                        </div>
                                    @endforeach
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
        <!-- #END# Horizontal Layout -->
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('add-file-btn').addEventListener('click', function() {
            const container = document.getElementById('file-input-container');
            const newInput = document.createElement('div');
            newInput.className = 'file-input-row d-flex align-items-center mb-2 border rounded';
            newInput.innerHTML = `
            <input type="file" name="files[]" id="files" class="form-control me-2">
            <button type="button" class="btn btn-danger btn-sm remove-btn" onclick="removeFileInput(this)">Remove</button>
        `;
            container.appendChild(newInput);
        });

        function removeFileInput(button) {
            button.closest('.file-input-row').remove();
        }

        function removeExistingFile(button) {
            button.closest('.file-input-row').remove();
        }
    </script>

    <script>
        $(document).ready(function() {
            $("#heroBannerForm").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this); // FormData object

                $.ajax({
                    url: "{{ route('banner.update') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        toastr.success("Banner updated successfully!");

                        $('#heroBannerForm')[0].reset();

                        $('#file-input-container').empty();

                        if (response.images && Array.isArray(response.images)) {
                            const baseUrl =`${window.location.origin}/`;
                            response.images.forEach((img) => {
                                $('#existing-files').append(`
                                    <div class="file-input-row d-flex align-items-center mb-2 border rounded">
                                        <input type="hidden" name="old_files[]" value="${img}">
                                        <img src="${baseUrl}${img}" alt="File" width="80" height="80" class="me-2">
                                        <button type="button" class="btn btn-danger btn-sm remove-btn" onclick="removeExistingFile(this)">Remove</button>
                                    </div>
                                `);
                            });
                        }
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON?.errors;
                        if (errors) {
                            $.each(errors, function(key, value) {
                                toastr.error(value[0], key);
                            });
                        } else {
                            toastr.error("Something went wrong. Please try again.");
                        }
                    }
                });
            });
        });
    </script>
@endpush
