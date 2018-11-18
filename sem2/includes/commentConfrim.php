<?php
include 'dbh.include.php';

if (isset($_POST['submit-comment'])) {
    $userid = $_POST['userid'];   
    $date = $_POST['date'];
    $message = $_POST['usercomment'];
    if (!strlen(trim($_POST['usercomment']))){
            header('Location: '.$_SERVER['HTTP_REFERER'].'?error=noTextInComment');
        exit();
    }else{
    $sql = "INSERT INTO comments (userid, date, message) VALUES ('$userid', '$date', '$message')";
    $result = mysqli_query($conn,$sql);
    header('Location: '.$_SERVER['HTTP_REFERER'].'?success=commentMade');
    exit();
}
}
