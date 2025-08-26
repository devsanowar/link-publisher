<!-- Edit Modal -->
<div class="modal fade" id="editLinkBuildingReasonModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Link Building Reason</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>

            <div class="modal-body">
                <form id="editLinkBuildingReasonForm">
                    @csrf

                    <input type="hidden" name="id" id="edit_id">

                    <div class="form-group">
                        <label>Title</label>
                        <div class="" style="border: 1px solid #ccc">
                        <input type="text" name="title" id="edit_title" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <div class="" style="border: 1px solid #ccc">
                        <textarea name="description" id="edit_description" class="form-control" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="is_active" id="edit_is_active" class="form-control show-tick">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" form="editLinkBuildingReasonForm" class="btn btn-primary">Update</button>
            </div>

        </div>
    </div>
</div>
