$(document).ready(function () {
    $(".commentSubmit").click(function () {
        $("#commentForm").submit(function (event) {
            event.preventDefault();
            let commForm = $(this);
            let url = commForm.attr('action');
            let type = commForm.attr('method');
            let user = $('#user').val();
            let date = $('#date').val();
            let comment = $('#usercomment').val();
            let submit = $('.commentSubmit').val();
            $.ajax({
                type: type,
                url: url,
                data: {
                    usr: user,
                    commentdate: date,
                    comment: comment,
                    sub: submit
                },
                success: function (response) {
                    if (response == 'Success!') {
                        location.reload();
                    } else {
                        $(".commentMsg").text(response);
                    }
                },
                dataType: 'json'
            });
        });
    });
$('body').on('click','.deleteComment', function () {
    let commForm = $(this);
    let commentID = commForm.attr('id');
    $.post('includes/commentDelete.php', { commentid: commentID }, function () { 
                location.reload();
    });
});

$.getJSON('includes/commentGet.php', function (data) {
    let user = data[0]['currentUser'];
    for (var i = 0; i < data.length; i++) {
        var deleteBtn = "";
        if (user == data[i]['id']) {
            deleteBtn = "<button class='deleteComment' id='"+data[i]['commentid']+"'>Delete</button>";
        }
        $(".loadcomments").append(
            "<br>"
            + "<div class='all-comments'>"
            + "<p>" + data[i]['user'] + "<br>"
            + data[i]['date'] + "<br>"
            + data[i]['message'] + "<br>"
            + deleteBtn + "</p>"
            + "</div>"
        );
    };
});
});
