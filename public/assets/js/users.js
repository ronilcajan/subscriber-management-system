$('#userTable').DataTable({
    responsive: true
});
$(".toggle-password").click(function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
});


$(document).ready(function(){

    $('span#edit-user').click(function(){
        var id = $(this).attr('data-id');
        var email = $(this).attr('data-email');
        var username = $(this).attr('data-username');
        var role = $(this).attr('data-role');

        $('#email').val(email);
        $('#id').val(id);
        $('#username').val(username);
        $('select#role').val(role).trigger("change");
        
    });
});