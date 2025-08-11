@extends('admin.layouts.app')
@section('title', 'Add Review')
@push('styles')
<link rel="stylesheet" href="{{ asset('backend') }}/assets/plugins/bootstrap-select/css/bootstrap-select.css" />
@endpush
@section('admin_content')
<div class="container-fluid">
    <!-- Horizontal Layout -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-uppercase"> Create review <span><a href="{{ route('review.index') }}" class="btn btn-primary right">All reviews</a></span></h4>

                </div>
                <div class="body">
                    <form id="reviewCreateForm" class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                            <label for="type"><b>Review Type</b></label>
                            <div class="form-group">
                                <select class="form-control show-tick" name="type">
                                    <option>Select type...</option>
                                    <option value="text">Text</option>
                                    <option value="video">Video</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                            <label for="review_name_id"><b>Name*</b></label>
                            <div class="form-group">
                                <div class="" style="border: 1px solid #ccc">
                                    <input type="text" id="review_name_id" name="name" class="form-control @error('name')invalid @enderror"
                                        placeholder="Enter Name ">
                                </div>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                            <label for="review_content"><b>Review Content</b></label>
                            <div class="form-group">
                                <div class="" style="border: 1px solid #ccc">
                                    <textarea type="text" rows="4" name="review" class="form-control @error('review')invalid @enderror" ></textarea>
                                </div>
                                @error('review')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>



                        <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                            <label for="customFile"><b>Review Image* (Image size:300 X 300 - Max size : 30px )</b></label>
                            <div class="form-group">
                                <div class="" style="border: 1px solid #ccc">
                                    <input type="file" class="form-control @error('image')invalid @enderror" id="customFile" / name="image">
                                </div>
                                @error('image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                            <label for="video_url"><b>Video Url</b></label>
                            <div class="form-group">
                                <div class="" style="border: 1px solid #ccc">
                                    <input type="text" id="video_url" name="video_url" class="form-control @error('video_url')invalid @enderror"
                                        placeholder="Enter Video Url ">
                                </div>
                                @error('video_url')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
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
    <!-- #END# Horizontal Layout -->
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $("#reviewCreateForm").submit(function(e){
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url:"{{ route('review.store') }}",
                type: "POST",
                data: formData,
                processData:false,
                contentType:false,

                success:function(response){
                    $("#reviewCreateForm")[0].reset();
                    $("#reviewCreateForm select").val('');
                    toastr.success(response.message);
                },
                error:function(xhr){
                    toastr.error('Something went wrong!');
                }
            });
        });
    });
</script>

@endpush
