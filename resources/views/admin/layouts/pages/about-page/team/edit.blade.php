@extends('admin.layouts.app')
@section('title', 'Edit Team')
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
                        <h4 class="">Edit Team<span><a href="{{ route('team.index') }}" class="btn btn-primary text-white text-uppercase text-bold right"> All team members </a></span< /h4>
                    </div>
                    <div class="body">
                        <form id="teamUpdateForm">
                            @csrf

                            <input type="hidden" name="id" value="{{ $team->id }}">
                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="name"><b>Name</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="name" name="name" class="form-control"
                                            placeholder="Enter Name" value="{{ $team->name }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="designation"><b>Designation</b></label>
                                <div class="form-group">
                                    <div class="" style="border: 1px solid #ccc">
                                        <input type="text" id="designation" name="designation" class="form-control"
                                            placeholder="Enter designation " value="{{ $team->designation }}">
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
                                    <img id="teamImagePreview" class="mt-2" src="{{ asset($team->image) }}" alt="team Image" width="60">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                                <label for="image"><b>Status</b></label>
                                <div class="form-group">
                                    <select name="status" class="form-control show-tick">
                                        <option disabled selected>Select Status....</option>
                                        <option value="1" {{ $team->status === 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $team->status === 0 ? 'selected' : '' }}>DeActive</option>
                                    </select>
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
            $("#teamUpdateForm").submit(function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url: "{{ route('team.update') }}",
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
                       
                        if(response.image_path){
                            $("#teamImagePreview").attr("src", response.image_path);
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
