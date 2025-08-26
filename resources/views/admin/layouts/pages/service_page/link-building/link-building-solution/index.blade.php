@extends('admin.layouts.app')
@section('title', 'Link building Solution')
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
                        <h4 class="">Link Building Solution
                        </h4>
                    </div>
                    <div class="body">
                        <form id="updateLinkBuilderSolution">
                            @csrf

                            <input type="hidden" name="id" value="{{ $linkPublishSolution->id ?? ''}}">
                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="section_title"><b>Section Title</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="section_title" name="section_title" class="form-control"
                                            placeholder="Enter section title " value="{{ $linkPublishSolution->section_title ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="title"><b>Sub Title</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="title" name="title" class="form-control"
                                            placeholder="Enter Title " value="{{ $linkPublishSolution->title ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="description"><b>Description</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <textarea name="description" rows="4" class="form-control">{!! $linkPublishSolution->description ?? '' !!}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div id="inputContainer" class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label><b>Features</b></label>

                                @php
                                    $features = $linkPublishSolution->features ?? [];
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
            $('#updateLinkBuilderSolution').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('link.building.solution.update') }}",
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
