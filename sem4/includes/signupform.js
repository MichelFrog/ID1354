$(document).ready(function () {
    $(".signupForm").submit(function (event) {
        event.preventDefault();
        let logForm = $(this);
        let url = logForm.attr('action');
        let type = logForm.attr('method');
        let user = $('#user').val();
        let mail = $('#mail').val();
        let pwd = $('#pwd').val();
        let pwdC = $('#pwdC').val();
        let submit = $('#signSubmit').val();
        $.ajax({
            type: type,
            url: url,
            data: {
                user: user,
                mail: mail,
                passwrd: pwd,
                passwrdC: pwdC,
                signupsubmit: submit
            },
            success: function (response) {
            if(response == 'Success!'){
                window.location.replace('/index.php');
                }else{
                $(".signupMsg").text(response);
            }
            },
            dataType: 'json'
        });
    });
});