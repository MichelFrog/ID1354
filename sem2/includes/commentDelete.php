<?php
include 'dbh.include.php';

    if (isset($_POST['commentDelete'])){
        $commentId = $_POST['commentid'];

        $sql = "DELETE FROM comments WHERE commentid='$commentId'";
        $resut = mysqli_query($conn,$sql);
        header('Location: '.$_SERVER['HTTP_REFERER'].'?success=commentDeleted');
        exit();
    }
