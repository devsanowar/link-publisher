<!-- Modal -->
<div class="modal fade" id="linkBuildingReasonModal" tabindex="-1" role="dialog"
    aria-labelledby="linkBuildingReasonModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="linkBuildingReasonModalLabel">Link Building Reason</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Body -->
            <div class="modal-body">
                <form id="addlinkBuildingReasonForm" action="{{ route('link.building.reason.features.store') }}" method="POST">
                    @csrf

                    <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                        <label for="title"><b> Title</b></label>
                        <div class="form-group">
                            <div class="" style="border: 1px solid #ccc">
                                <input type="text" id="title" name="title" class="form-control"
                                    placeholder="Enter title ">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                        <label for="description"><b>Description</b></label>
                        <div class="form-group">
                            <div class="" style="border: 1px solid #ccc">
                                <textarea name="description" rows="4" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-8 col-xs-7 mb-3">
                        <label for="video_url"><b>Status</b></label>
                        <div class="form-group">
                            <div class="" style="border: 1px solid #ccc">
                                <select name="is_active" id="" class="form-control show-tick">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="addlinkBuildingReasonForm" class="btn btn-primary">Save</button>
            </div>

        </div>
    </div>
</div>
