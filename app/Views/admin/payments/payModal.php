<!-- create modal -->
<div id="payModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Create Payment</h4> </div>
            <form action="<?= base_url('admin/create-subject') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="subject_code" class="control-label">Account name:</label>
                        <input type="text" class="form-control" name="subject_code" required="">
                    </div>
                    <div class="form-group">
                        <label for="subject" class="control-label">Subject Name:</label>
                        <input type="text" class="form-control" name="subject" required="">
                    </div>
                    <div class="form-group">
                        <label for="description" class="control-label">Description:</label>
                        <textarea class="form-control" name="description" required=""></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button class="btn btn-info waves-effect waves-light" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>