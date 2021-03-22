function getTransactions(that){
    var id = $(that).attr('data-id');
    var account = $(that).attr('data-account');
    var date = $(that).attr('data-date');
    var payment = $(that).attr('data-payment');
    var notes = $(that).attr('data-notes');

    $('#transaction_id').val(id);
    $('#account').val(account);
    $('#date_paid').val(date);
    $('#amount').val(payment);
    $('#notes').val(notes);
}