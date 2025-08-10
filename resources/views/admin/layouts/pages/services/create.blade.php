@extends('admin.layouts.app')
@section('title', 'Add Service')
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
                    <h4 class="text-uppercase"> Create Service <span><a href="{{ route('services.index') }}" class="btn btn-primary right">All Services</a></span></h4>

                </div>
                <div class="body">
                    <form id="serviceCreateForm" class="form-horizontal" method="POST">
                        @csrf

                        <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                            <label for="icon"><b>Service Icon Class *</b></label>
                            <div class="form-group">
                                <div class="" style="border: 1px solid #ccc">
                                    <input type="text" id="icon" name="icon" class="form-control @error('icon')invalid @enderror"
                                        placeholder="Enter service icon ">
                                </div>
                                @error('icon')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                            <label for="title"><b>Service Title*</b></label>
                            <div class="form-group">
                                <div class="" style="border: 1px solid #ccc">
                                    <input type="text" id="title" name="title" class="form-control @error('title')invalid @enderror"
                                        placeholder="Enter service title ">
                                </div>
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                            <label for="url"><b>Service Url</b></label>
                            <div class="form-group">
                                <div class="" style="border: 1px solid #ccc">
                                    <input type="text" id="url" name="url" class="form-control @error('url')invalid @enderror"
                                        placeholder="Enter service title ">
                                </div>
                                @error('url')
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
        $("#serviceCreateForm").submit(function(e){
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('services.store') }}",
                type:"POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token
                },
                success:function(response){
                    $("#serviceCreateForm")[0].reset();
                    toastr.success(response.message);
                },
                error:function(xhr){
                    toastr.error('Something went wrong');
                }
            });
        })
    });
</script>
@endpush
