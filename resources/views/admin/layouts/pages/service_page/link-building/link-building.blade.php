@extends('admin.layouts.app')
@section('title', 'Link Building Services')
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
                        <h4 class="">About Link building Services</h4>
                    </div>
                    <div class="body">
                        <form id="aboutLinkbuildingFormUpdate" class="form-horizontal" method="POST">
                            @csrf

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="title"><b>Title</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="title" name="title" class="form-control"
                                            placeholder="Enter Title " value="{{ $aboutLinkBuilding->title ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="subtitle"><b>Sub Title</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="subtitle" name="subtitle" class="form-control"
                                            placeholder="Enter Sub Title " value="{{ $aboutLinkBuilding->subtitle ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div id="inputContainer" class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label><b>Features</b></label>

                                @php
                                    $features = $aboutLinkBuilding->features ?? [];
                                @endphp

                                @if (count($features) > 0)
                                    @foreach ($features as $feature)
                                        <div class="input-group mb-2">
                                            <input type="text" name="features[]" class="form-control"
                                                placeholder="Enter feature" value="{{ $feature }}"
                                                style="border:1px solid #ccc;padding:9px 10px;">
                                            <button type="button" onclick="removeField(this)"
                                                class="btn btn-danger ms-2">Remove</button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="input-group mb-2">
                                        <input type="text" name="features[]" class="form-control"
                                            placeholder="Enter feature" style="border:1px solid #ccc;padding:9px 10px;">
                                        <button type="button" onclick="removeField(this)"
                                            class="btn btn-danger ms-2">Remove</button>
                                    </div>
                                @endif

                                <!-- Add Feature Button -->
                                <button type="button" onclick="addField()" class="btn btn-primary mt-2">Add
                                    Feature</button>
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="button_one_name"><b>Button One Name</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="button_one_name" name="button_one_name"
                                            class="form-control" placeholder="Enter Button One Name "
                                            value="{{ $aboutLinkBuilding->button_one_name ?? '' }}">
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="button_one_url"><b>Button One Url</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="button_one_url" name="button_one_url" class="form-control"
                                            placeholder="Enter Button One url "
                                            value="{{ $aboutLinkBuilding->button_one_url ?? '' }}">
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="button_two_name"><b>Button Two Name</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="button_two_name" name="button_two_name"
                                            class="form-control" placeholder="Enter Button two Name "
                                            value="{{ $aboutLinkBuilding->button_two_name ?? '' }}">
                                    </div>
                                </div>

                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="button_two_url"><b>Button Two Url</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="button_two_url" name="button_two_url" class="form-control"
                                            placeholder="Enter Button Two url "
                                            value="{{ $aboutLinkBuilding->button_two_url ?? '' }}">
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="video_url"><b>Video Url</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="video_url" name="video_url" class="form-control"
                                            placeholder="Enter video url "
                                            value="{{ $aboutLinkBuilding->video_url ?? '' }}">
                                    </div>
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
    <script>
        function addField() {
            let container = document.getElementById("inputContainer");

            let div = document.createElement("div");
            div.className = "input-group mb-2";

            div.innerHTML = `
            <input type="text" name="features[]" placeholder="Enter feature" 
                   class="form-control" style="border:1px solid #ccc;padding:9px 10px" />
            <button type="button" onclick="removeField(this)" 
                    class="btn btn-danger ms-2">Remove</button>
        `;

            container.appendChild(div);
        }

        function removeField(button) {
            button.parentElement.remove();
        }
    </script>

    <!-- Update about Link building Form Update form -->
    <script>
        $(document).ready(function() {
            $('#aboutLinkbuildingFormUpdate').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('link_building.update') }}",
                    data: formData,
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
