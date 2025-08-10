<!-- Modal -->
<div class="modal fade" id="serviceEditModal" tabindex="-1" role="dialog" aria-labelledby="serviceEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header text-white" style="background-color: var(--priamary) !important;">
                <h5 class="modal-title" id="serviceEditModalLabel">Edit Service</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="serviceUpdateForm" class="form-horizontal" method="POST">
                    @csrf

                    <input type="hidden" value="{{ $service->id }}" name="id" id="service_id">

                    <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                        <label for="icon"><b>Service Icon Class *</b></label>
                        <div class="form-group">
                            <div style="border: 1px solid #ccc">
                                <input type="text" id="icon" name="icon" class="form-control @error('icon') invalid @enderror"
                                    placeholder="Enter service icon" value="{{ $service->icon }}">
                            </div>
                            @error('icon')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                        <label for="title"><b>Service Title*</b></label>
                        <div class="form-group">
                            <div style="border: 1px solid #ccc">
                                <input type="text" id="title" name="title" class="form-control @error('title') invalid @enderror"
                                    placeholder="Enter service title" value="{{ $service->title }}">
                            </div>
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                        <label for="url"><b>Service Url</b></label>
                        <div class="form-group">
                            <div style="border: 1px solid #ccc">
                                <input type="text" id="url" name="url" class="form-control @error('url') invalid @enderror"
                                    placeholder="Enter service URL" value="{{ $service->url }}">
                            </div>
                            @error('url')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
