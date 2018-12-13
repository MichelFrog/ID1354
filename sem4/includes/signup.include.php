<?php

    require 'dbh.include.php';

    $username = $_POST['user'];
    $email = $_POST['mail'];
    $password = $_POST['passwrd'];
    $passwordConfirm = $_POST['passwrdC'];

    $result = 0;
    if(empty($username) || empty($email) || empty($password) || empty($passwordConfirm)) {
        $msg = 'Empty fields in form!';
        echo JSON_encode($msg); 
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $msg = 'Invalid username or password.';
        echo JSON_encode($msg); 
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = 'Invalid email format.';
        echo JSON_encode($msg); 
    }
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $msg = 'Invalid username format.';
        echo JSON_encode($msg); 
        }
    elseif ($password !== $passwordConfirm ){
        $msg = 'Password dont match.';
        echo JSON_encode($msg);     }
    else {
        $sql = "SELECT nameuser FROM users WHERE nameuser=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            $msg = 'Server ERROR. Try again later.';
            echo JSON_encode($msg);         }
        else{ //passing only one string
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0) {
                $msg = 'Username or email already taken.';
                echo JSON_encode($msg);  
            }
            else {
                $sql = "INSERT INTO users(nameuser, emailuser, pwduser) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    $msg = 'Server ERROR,please try again later.';
                    echo JSON_encode($msg);
                }
                else {
                    $hashPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $username, $email,$hashPwd);
                    mysqli_stmt_execute($stmt);
                    $msg = 'Success!';
                    echo JSON_encode($msg);                }
            }
        }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    }


