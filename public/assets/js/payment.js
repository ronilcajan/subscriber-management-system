$(document).ready(function(){
    $(".sendEmail").on('click', function(){
        $(".preloader").show();
    });
});

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
            console.log(response);
            if(response.success === true){
                $('#pment').html('<option value="">Select Date</option>');
                $.each(response.pment, function( index, value ) {
                    $('#pment').append('<option value="'+value.date +'">'+value.formatted_date+'</option>');
                });
                $("#pment").attr('date-due', response.due);
                $("#pment").attr('date-monthly', response.monthly);
            }
        }
    });

}

function calculatePay(that){
    var date = $(that).val();
    var dueDate = $(that).attr('date-due');
    var monthly = $(that).attr('date-monthly');

    var dailyPay = parseFloat(monthly / 30).toFixed(2);

    var date1 = new Date(date); 
    var date2 = new Date(dueDate);

    if(date1.getDate() == date2.getDate()){
        var months = monthDiff(date1,date2);
        var totalPay = monthly*months;

    }else{
        var days = daysDiff(date1,date2);
        var totalPay = dailyPay*days;
    }

    $('#to_pay').val(Math.round(totalPay).toFixed(2));
}

function monthDiff(d1, d2) {
    var diff =(d2.getTime() - d1.getTime()) / 1000;
    diff /= (60 * 60 * 24 * 7 * 4);
    return Math.abs(Math.round(diff));
}

function daysDiff(d1, d2) {
    var Difference_In_Time = d1.getTime() - d2.getTime(); 
    var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24); 
    return Difference_In_Days;
}