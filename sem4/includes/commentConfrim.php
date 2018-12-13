<?php
include 'dbh.include.php';

if (isset($_POST['sub'])) {
    $userid = $_POST['usr'];   
    $date = $_POST['commentdate'];
    $message = $_POST['comment'];
    if (!strlen(trim($_POST['comment']))){
        $msg = 'Comment must contain text!';
        echo JSON_encode($msg);
        }else{
    $sql = "INSERT INTO comments (userid, date, message) VALUES ('$userid', '$date', '$message')";
    $result = mysqli_query($conn,$sql);
    $msg = 'Success!';
    echo JSON_encode($msg);
}
}
