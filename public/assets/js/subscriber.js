$('#subscriberTable').DataTable({
    responsive: true
});
$('.mydatepicker').datepicker({
    todayHighlight: true
});

$(document).ready(function() {
    $('div.option-cont').click(function () {
        if (this.id == "opt1") {
            $('#option1').show();
        }else{
            $('#option1').hide();
        }
        if (this.id == "opt2") {
            $('#option2').show();
        } else{
            $('#option2').hide();
        }
        if (this.id == "opt3") {
            $('#option3').show();
        } else{
            $('#option3').hide();
        }
    });
 });