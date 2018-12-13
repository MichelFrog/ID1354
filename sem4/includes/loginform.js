$(document).ready(function () {
    $("#loginsubmit").click(function(){
        $(".loginform").submit(function (event) {
            event.preventDefault();
            let logForm = $('.loginform');
            let url = logForm.attr('action');
            let type = logForm.attr('method');
            let username = $('#username').val();
            let password = $('#password').val();
            let submit = $('#loginsubmit').val();
            $.ajax({
                type: type,
                url: url,
                data: {
                    nameusr: username,
                    passwrd: password,
                    sub: submit
                },
                success: function (response) {
                if(response == 'Success!'){
                    location.reload();
                }else{
                    $(".formMsg").text(response);
                }
                },
                dataType: 'json'
            });
        });
    });
});
