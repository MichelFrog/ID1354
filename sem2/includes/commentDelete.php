<?php
include 'dbh.include.php';

        $commentId = $_POST['commentid'];

        $sql = "DELETE FROM comments WHERE commentid='$commentId'";
        $resut = mysqli_query($conn,$sql);
        $msg = "Success!";
        echo json_encode($msg);
