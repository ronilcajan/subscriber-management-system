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