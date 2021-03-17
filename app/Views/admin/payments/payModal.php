<!-- create modal -->
<div id="payModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Create Payment</h4> </div>
            <form action="<?= base_url('admin/paynow') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="acount" class="control-label">Account name:</label>
                        <input type="text" id="account" class="form-control" readonly name="account" required="">
                    </div>
                    <div class="form-group">
                        <label for="acount" class="control-label">Date:</label>
                        <input type="date" class="form-control" name="date_paid" required="">
                    </div>
                    <div class="form-group">
                        <label for="subject" class="control-label">Payment for:</label>
                        <select class="form-control" name="pment" id="pment">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description" class="control-label">Notes</label>
                        <textarea class="form-control" name="notes" placeholder="Write something here.."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="account_id">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-info waves-effect waves-light" type="submit">Pay</button>
                </div>
            </form>
        </div>
    </div>
</div>