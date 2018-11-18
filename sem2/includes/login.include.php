<?php

if(isset($_POST['login-submit'])){

    require 'dbh.include.php';
    $mail = $_POST['mailid'];
    $password = $_POST['pwd'];
   
    if (empty($mail) || empty($password)) {
        header("Location: ../index.php?error=poop");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE nameuser=? OR emailuser=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $mail, $mail);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['pwduser']);
                if ($pwdCheck == false) {
                    header("Location: ../index.php?error=wrongpassword");
                    exit();
                }//double check password
                elseif ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['username'] = $row['nameuser'];
                    header("Location: ../index.php?login=sucessful");
                    exit();
                }
                else {
                    header("Location: ../index.php?error=wrongpassword");
                    exit();
                }
            }
            else {
                header("Location: ../index.php?error=nosuchuser");
                exit();
            }
        }

    }
}
else {
    header("Location: ../index.php");
    exit();
}
?>