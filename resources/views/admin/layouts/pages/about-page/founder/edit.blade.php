@extends('admin.layouts.app')
@section('title', 'Edit Founder')
@section('admin_content')
    <div class="container-fluid">
        
        @include('admin.layouts.pages.about-page.about-menu')


        <!-- Horizontal Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="">Edit Founder<span><a href="{{ route('founder.index') }}" class="btn btn-primary text-white text-uppercase text-bold right"> All Founder </a></span< /h4>
                    </div>
                    <div class="body">
                        <form id="founderUpdateForm">
                            @csrf

                            <input type="hidden" name="id" value="{{ $founder->id }}">
                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="name"><b>Name</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="name" name="name" class="form-control"
                                            placeholder="Enter Name" value="{{ $founder->name }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="designation"><b>Designation</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="designation" name="designation" class="form-control"
                                            placeholder="Enter designation " value="{{ $founder->designation }}">
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="social_icon"><b>Social Icon Image</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="file" id="social_icon" name="social_icon" class="form-control"
                                            placeholder="Enter Social Icon ">
                                    </div>
                                    <img id="socialIconPreview" class="mt-2" src="{{ asset($founder->social_icon) }}" width="30" alt="Social icon">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="social_url"><b>Social Url</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="social_url" name="social_url" class="form-control"
                                            placeholder="Enter Social Url " value="{{ $founder->social_url }}">
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="image"><b>Image</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="file" id="image" name="image" class="form-control"
                                            placeholder="Enter image ">
                                    </div>
                                    <img id="founderImagePreview" class="mt-2" src="{{ asset($founder->image) }}" alt="Founder Image" width="60">
                                </div>
                            </div>


                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7">
                                <button type="submit" class="btn btn-raised btn-primary m-t-15 waves-effect">UPDATE</button>
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
            $("#founderUpdateForm").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('founder.update') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        toastr.options = {
                            timeOut: 1500,
                            extendedTimeOut: 1000,
                            closeButton: true,
                            progressBar: true,
                            positionClass: 'toast-top-right'
                        };
                        toastr.success(response.message);

                        if(response.social_icon_path){
                            $("#socialIconPreview").attr("src", response.social_icon_path);
                        }
                        if(response.image_path){
                            $("#founderImagePreview").attr("src", response.image_path);
                        }

                    },
                    error: function({
                        responseJSON
                    }) {
                        toastr.error(responseJSON?.message || 'Something went wrong!');
                    }
                });
            });
        });
    </script>
@endpush
