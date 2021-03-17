function showPment(that){
    var id = $(that).attr('data-id');
    var account = $(that).attr('data-account');

    $("#account").val(account);
    $("#account_id").val(id);

    $.ajax({
        type: "POST",
        url: SITE_URL+"/admin/getPayment",
        data: {
            id:id
        },
        dataType: "json",
        success: function(response) {
            console.log(response.pment);
            if(response.success === true){
                $('#pment').html('<option value="">Select Amount</option>');
                $.each(response.pment, function( index, value ) {
                    var data = parseFloat(value.pay).toFixed(2);
                    $('#pment').append('<option value="'+value.no +'">P '+data+'</option>');
                });

            }
        }
    });

}