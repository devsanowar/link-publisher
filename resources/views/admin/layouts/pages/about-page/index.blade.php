@extends('admin.layouts.app')
@section('title')
    About Page
@endsection
@push('styles')

    <style>
        .form-group .form-control {
            padding-left: 10px;
        }

        .input-group .form-line + .input-group-addon {
            padding-right: 10px;
            top: 13px;
        }

        .input-group input[type="text"], .input-group .form-control {
                padding-left: 10px;
            }


    </style>
@endpush
@section('admin_content')
    <div class="container-fluid">
        @include('admin.layouts.pages.about-page.about-menu')


        <!-- Horizontal Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="">About Company</h4>
                    </div>
                    <div class="body">
                        <form id="aboutCompanyForm" class="form-horizontal" method="POST" action="{{ route('about.company.update') }}">
                            @csrf

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="title"><b>About Title</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="title" name="title" class="form-control"
                                            placeholder="Enter Title "
                                            value="{{ $aboutPageAbout->title }}">
                                    </div>
                                </div>
                            </div>

                           

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="about_content"><b>About Contents</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <textarea type="text" id="ckeditor" name="about_content" class="form-control">{!! $aboutPageAbout->about_content !!}</textarea>
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
<script src="{{ asset('backend') }}/assets/plugins/ckeditor/ckeditor.js"></script> <!-- Ckeditor -->
<script src="{{ asset('backend') }}/assets/js/pages/forms/editors.js"></script>

<script>
    $(document).ready(function(){
    $("#aboutCompanyForm").submit(function(e){
        e.preventDefault();

        let formData = $(this).serialize();

        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: (response) => {
                
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
