$('#accountTable').DataTable({
    responsive: true,
    language: {
        search: "_INPUT_",
        searchPlaceholder: "Search..."
    }
});
$('#acctransactionTable').DataTable({
    responsive: true,
    language: {
        search: "_INPUT_",
        searchPlaceholder: "Search..."
    }
});
$('#transactionTable').DataTable({
    responsive: true,
    language: {
        search: "_INPUT_",
        searchPlaceholder: "Search..."
    }
});

$(".select2").select2();

function changeAccStatus(that) {
    var checkBox = $(that);
    var id = $(that).attr('data-id');

    if (checkBox.is(':checked')) {
        var status = "Active";
    }else{
        var status = "Inactive";
    }

    $.ajax({
        type: "POST",
        url: SITE_URL+"/admin/changeAccStatus",
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