@extends('admin.layouts.app')
@section('title', 'Our Story')
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/bootstrap-select/css/bootstrap-select.css" />
@endpush
@section('admin_content')
    <div class="container-fluid">
        @include('admin.layouts.pages.about-page.about-menu')


        <!-- Horizontal Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="">Company Story</h4>
                    </div>
                    <div class="body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active text-uppercase text-dark" data-toggle="tab"
                                    href="#sectionOne"><i class="material-icons">menu</i> Section One </a></li>

                            <li class="nav-item"><a class="nav-link text-uppercase text-dark" data-toggle="tab"
                                    href="#sectionTwo"> <i class="material-icons">menu</i> Section Two
                                </a></li>
                            <li class="nav-item"><a class="nav-link text-uppercase text-dark" data-toggle="tab"
                                    href="#sectionThree"><i class="material-icons">menu</i> Section Three </a>
                            </li>

                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="sectionOne">

                                <form id="sectionOneForm" enctype="multipart/form-data">
                                    @csrf

                                    <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                        <label for="section_title"><b>Section Title*</b></label>
                                        <div class="form-group">
                                            <div class="" style="border: 1px solid #ccc">
                                                <input type="text" id="section_title" name="section_title"
                                                    class="form-control" placeholder="Enter section title "
                                                    value="{{ $storyContent->section_title ?? 'N/A' }}">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                        <label for="section_subtitle"><b>Section Text*</b></label>
                                        <div class="form-group">
                                            <div class="" style="border: 1px solid #ccc">
                                                <textarea type="text" id="" name="section_subtitle" class="form-control ckeditor">{!! $storyContent->section_subtitle !!}</textarea>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                        <label for="title"><b>Story Title*</b></label>
                                        <div class="form-group">
                                            <div class="" style="border: 1px solid #ccc">
                                                <input type="text" id="title" name="title" class="form-control"
                                                    placeholder="Enter title " value="{{ $storyContent->title ?? 'N/A' }}">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                        <label for="story_content"><b>Story Contents</b></label>
                                        <div class="form-group">
                                            <div class="" style="border: 1px solid #ccc">
                                                <textarea type="text" id="" name="story_content" class="form-control ckeditor">{!! $storyContent->story_content !!}</textarea>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                        <label for="image"><b>Story Image*</b></label>
                                        <div class="form-group">
                                            <div class="" style="border: 1px solid #ccc">
                                                <input type="file" id="image" name="image" class="form-control"
                                                    value="{{ $storyContent->image ?? 'N/A' }}">
                                            </div>
                                            <img id="storyImagePreview" class="mt-2"
                                                src="{{ asset($storyContent->image) }}" alt="Story Image" width="50">
                                        </div>
                                    </div>


                                    <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7">
                                        <button type="submit"
                                            class="btn btn-raised btn-primary m-t-15 waves-effect">UPDATE</button>
                                    </div>

                                </form>
                            </div>

                            <div role="tabpanel" class="tab-pane in" id="sectionTwo">
                                <form id="sectionTwoForm">
                                    @csrf
                                    <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                        <label for="section_title_two"><b>Section Title*</b></label>
                                        <div class="form-group">
                                            <div class="" style="border: 1px solid #ccc">
                                                <input type="text" id="section_title_two" name="section_title_two"
                                                    class="form-control" placeholder="Enter title "
                                                    value="{{ $storyContent->section_title_two ?? 'N/A' }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                        <label for="story_content_two"><b>Section Text*</b></label>
                                        <div class="form-group">
                                            <div class="" style="border: 1px solid #ccc">
                                                <textarea type="text" id="story_content_two" name="story_content_two" class="form-control ckeditor">{!! $storyContent->story_content_two !!}</textarea>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7">
                                        <button type="submit"
                                            class="btn btn-raised btn-primary m-t-15 waves-effect">UPDATE</button>
                                    </div>

                                </form>
                            </div>


                            <div role="tabpanel" class="tab-pane" id="sectionThree">
                                <form id="sectionThreeForm">
                                    @csrf


                                    <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                        <label for="section_title_three"><b>Section Title*</b></label>
                                        <div class="form-group">
                                            <div class="" style="border: 1px solid #ccc">
                                                <input type="text" id="section_title_three" name="section_title_three"
                                                    class="form-control" placeholder="Enter title "
                                                    value="{{ $storyContent->section_title_three ?? 'N/A' }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                        <label for="story_content_three"><b>Section Text*</b></label>
                                        <div class="form-group">
                                            <div class="" style="border: 1px solid #ccc">
                                                <textarea type="text" id="story_content_three" name="story_content_three" class="form-control ckeditor">{!! $storyContent->story_content_three !!}</textarea>

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

        </div>

    </div>
@endsection

@push('scripts')
    <script src="{{ asset('backend') }}/assets/plugins/ckeditor/ckeditor.js"></script> <!-- Ckeditor -->
    <script src="{{ asset('backend') }}/assets/js/pages/forms/editors.js"></script>

    <script>
        $(document).ready(function() {

            // Section One
            $("#sectionOneForm").submit(function(e) {
                e.preventDefault();

                for (var instanceName in CKEDITOR.instances) {
                    CKEDITOR.instances[instanceName].updateElement();
                }

                let formData = new FormData(this);
                $.ajax({
                    url: "{{ route('company.story.updateOne') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        toastr.success(response.message);
                        if (response.image) {
                            $("#storyImagePreview").attr("src", response.image + "?v=" +
                                new Date().getTime());
                        }
                    }
                });
            });

            // Section Two
            $("#sectionTwoForm").submit(function(e) {
                e.preventDefault();

                for (let instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }

                let formData = new FormData(this);
                $.ajax({
                    url: "{{ route('company.story.updateTwo') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        toastr.success(response.message);
                    }
                });
            });

            // Section Three
            $("#sectionThreeForm").submit(function(e) {
                e.preventDefault();

                for (let instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }

                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('company.story.updateThree') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        toastr.success(response.message);
                    }
                });
            });

        });
    </script>
@endpush
