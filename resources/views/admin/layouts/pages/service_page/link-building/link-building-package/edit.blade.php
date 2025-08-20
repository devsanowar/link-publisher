@extends('admin.layouts.app')
@section('title', 'Edit Link Building Packages')
@push('styles')
<link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/bootstrap-select/css/bootstrap-select.css" />
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
                        <h4 class="">Edit Link building package<span><a href="{{ route('link_building.packages.index') }}" class="btn btn-primary text-white text-uppercase text-bold right"> All Packages </a></span></h4>
                    </div>
                    <div class="body">
                        <form id="editLinkBuildingPackage" class="form-horizontal" method="POST">
                            @csrf

                            <input type="hidden" name="id" value="{{ $package->id }}">
                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="video_url"><b>Package Type</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                       <select name="package_type" id="" class="form-control show-tick">
                                            <option value="lite" {{ $package->package_type == 'lite' ? 'selected' : '' }}>Lite</option>
                                            <option value="standard" {{ $package->package_type == 'standard' ? 'selected' : '' }}>Standard</option>
                                            <option value="premium" {{ $package->package_type == 'premium' ? 'selected' : '' }}>Premium</option>
                                            <option value="customize" {{ $package->package_type == 'customize' ? 'selected' : '' }}>Customized</option>
                                       </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="price"><b>Price</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="price" name="price" class="form-control"
                                            placeholder="Enter price " value="{{ $package->price ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            

                            <div id="inputContainer" class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label><b>Features</b></label>

                                @php
                                    $features = $package->features ?? [];
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
                                <label for="button_text"><b>Button Name</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="button_text" name="button_text"
                                            class="form-control" placeholder="Enter Button Name" value="{{ $package->button_text ?? '' }}">
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="button_url"><b>Button Url</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="button_url" name="button_url" class="form-control"
                                            placeholder="Enter Button url" value="{{ $package->button_url ?? '' }}">
                                    </div>
                                </div>

                            </div>



                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="video_url"><b>Status</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <select name="is_active" id="" class="form-control show-tick">
                                            <option value="1" {{ $package->is_active == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $package->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                                        </select>
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
            $('#editLinkBuildingPackage').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('link_building.packages.update') }}",
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
