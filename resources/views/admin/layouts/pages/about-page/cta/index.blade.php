@extends('admin.layouts.app')
@section('title', 'CTA')
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
                            <a href="{{ route('founder.index') }}"
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
                        <h4 class="">Talk to an Expert</h4>
                    </div>
                    <div class="body">
                        <form id="ctaCreateForm">
                            @csrf

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="title"><b>Title</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="title" name="title" class="form-control"
                                            placeholder="Enter Title "
                                            value="{{ $aboutPageCta->title }}">
                                    </div>
                                </div>
                            </div>

                           

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="content"><b>Short Description</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <textarea type="text" rows="4" name="content" class="form-control">{!! $aboutPageCta->content !!}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="button_name"><b>Button Name</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="button_name" name="button_name" class="form-control"
                                            placeholder="Enter button name "
                                            value="{{ $aboutPageCta->button_name }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="button_url"><b>Button Url</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="button_url" name="button_url" class="form-control"
                                            placeholder="Enter button url "
                                            value="{{ $aboutPageCta->button_url }}">
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
        $(document).ready(function(){
            $("#ctaCreateForm").submit(function(e){
                e.preventDefault();

                let formData = $(this).serialize();

                $.ajax({
                    url:"{{ route('about_page.cta.update') }}",
                    type: "POST",
                    data:formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success:function(response){
                        toastr.options = {
                            timeOut: 1500,
                            extendedTimeOut: 1000,
                            closeButton: true,
                            progressBar: true,
                            positionClass: 'toast-top-right'
                        };

                        toastr.success(response.message);
                    },
                    error: ({ responseJSON }) => {
                        toastr.error(responseJSON?.message || 'Something went wrong!');
                    },
                });
            });
        });
    </script>
@endpush