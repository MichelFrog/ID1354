$(document).ready(function () {
    $(".logoutform").submit(function (event) {
        event.preventDefault();
        let logForm = $(this);
        let url = logForm.attr('action');
        let type = logForm.attr('method');
        let submit = $('#loginsubmit').val();
        $.ajax({
            type: type,
            url: url,
            data: {
                sub: submit
            },
            success: function (response) {
                $(".formMsg").text(response);
                setTimeout(function () {
                    location.reload();
                }, 1200);
            },
            dataType: 'json'
        });
    });
});