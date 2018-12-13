<?php
    require 'dbh.include.php';
    if(isset($_POST['sub'])){

    $mail = $_POST['nameusr'];
    $password = $_POST['passwrd'];

    if (empty($mail) || empty($password)) {
        $msg = 'Empty fields!';
        echo JSON_encode($msg);    
    }
    else {
        $sql = "SELECT * FROM users WHERE nameuser=? OR emailuser=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            $msg = 'SQL error!';
            echo JSON_encode($msg);
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $mail, $mail);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['pwduser']);
                if ($pwdCheck == false) {
                    $msg = 'Incorrect password';
                    echo JSON_encode($msg); 
                }//double check password
                elseif ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['username'] = $row['nameuser'];
                    $msg = 'Success!';
                    echo JSON_encode($msg);                 }
                else {
                    $msg = 'Incorrect password!';
                    echo JSON_encode($msg); 
                }
            }
            else {
                $msg = 'No such user!';
                echo JSON_encode($msg); 
            }
        }

    }
}
?>