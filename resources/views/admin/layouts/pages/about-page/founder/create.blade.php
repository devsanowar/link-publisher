@extends('admin.layouts.app')
@section('title', 'Add Founder')
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
                            <a href="{{ route('founder.create') }}"
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
                        <h4 class="">Founder<span><a href="{{ route('founder.index') }}" class="btn btn-primary text-white text-uppercase text-bold right">
                        All Founder
                   </a></span</h4>
                    </div>
                    <div class="body">
                        <form id="founderCreateForm">
                            @csrf

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="name"><b>Name</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="name" name="name" class="form-control"
                                            placeholder="Enter Name">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="designation"><b>Designation</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="designation" name="designation" class="form-control"
                                            placeholder="Enter designation ">
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
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="social_url"><b>Social Url</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="social_url" name="social_url" class="form-control"
                                            placeholder="Enter Social Url ">
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
                                </div>
                            </div>



                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7">
                                <button type="submit"
                                    class="btn btn-raised btn-primary m-t-15 waves-effect">SAVE</button>
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
            $("#founderCreateForm").submit(function(e){
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url:"{{ route('founder.store') }}",
                    type:"POST",
                    data:formData,
                    processData:false,
                    contentType:false,
                    headers:{
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success:function(response){
                        $("#founderCreateForm")[0].reset();

                        toastr.options = {
                            timeOut: 1500,
                            extendedTimeOut: 1000,
                            closeButton: true,
                            progressBar: true,
                            positionClass: 'toast-top-right'
                        };
                        toastr.success(response.message);
                    },
                    error:function({ responseJSON }){
                        toastr.error(responseJSON?.message || 'Something went wrong!');
                    }
                });
            });
        });
    </script>
@endpush