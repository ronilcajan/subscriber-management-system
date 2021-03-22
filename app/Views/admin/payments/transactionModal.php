<!-- create modal -->
<div id="transactionModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Create Payment</h4> </div>
            <form action="<?= base_url('admin/updateTrans') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="acount" class="control-label">Account name:</label>
                        <input type="text" id="account" class="form-control" value="<?= old('account') ?>" name="account" required="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="acount" class="control-label">Date:</label>
                        <input type="date" id="date_paid" class="form-control" name="date_paid" value="<?= old('date_paid') ?>" required="">
                    </div>
                    <div class="form-group">
                        <label for="acount" class="control-label">Amount:</label>
                        <input type="text" id="amount" class="form-control" value="<?= old('amount') ?>" name="amount" required="">
                    </div>
                    <div class="form-group">
                        <label for="description" class="control-label">Notes</label>
                        <textarea class="form-control" name="notes" id="notes" placeholder="Write something here.."><?= old('notes') ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="transaction_id">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-success waves-effect waves-light" type="submit">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>