$('#subscriberTable').DataTable({
    responsive: true
});
$('.mydatepicker').datepicker({
    todayHighlight: true
});

function changeSubsStatus(that) {
    var checkBox = $(that);
    var id = $(that).attr('data-id');

    if (checkBox.is(':checked')) {
        var status = "Active";
    }else{
        var status = "Inactive";
    }

    $.ajax({
        type: "POST",
        url: SITE_URL+"/admin/changeSubsStatus",
        data: {
            id:id,status:status
        },
        dataType: "json",
        success: function(response) {
            console.log(response);
            if(response.success === true){
                location.reload();
            }
        }
    });

  }

function calculateDate(that){
    var date_started = $(that).val();
    var date = new Date(date_started);
    
    due_date = new Date(date.getFullYear(), date.getMonth()+1, 1);
    due_date.setDate(due_date.getDate() + 5); //number  of days to add, e.x. 5 days
    var final_due_date = due_date.toISOString().substr(0,10);
    
    $('#due_date').val(GetFormattedDate(final_due_date));
    $('#schedule').val(getDay(final_due_date)+'th day of the month');

}

function calculateDay(that){
    var due_date = $(that).val();
    var date = new Date(due_date);

    $('#schedule').val(getDay(date)+'th day of the month');
}

function GetFormattedDate(date) {
    var fomatDate = new Date(date);
    var month = `${fomatDate.getMonth() + 1}`.padStart(2, "0");
    var day = `${fomatDate .getDate()}`.padStart(2, "0");
    var year = fomatDate .getFullYear();
    return month + "/" + day + "/" + year;
}

function getDay(date) {
    var fomatDate = new Date(date);
    var day = fomatDate .getDate();
    return day;
}

