<?php
if (isset($_POST['signup-submit'])){

    require 'dbh.include.php';

    $username = $_POST['userid'];
    $email = $_POST['mailid'];
    $password = $_POST['pwd'];
    $passwordConfirm = $_POST['pwd-confirm'];

    if(empty($username) || empty($email) || empty($password) || empty($passwordConfirm)) {
        header("Location:  ../signup.php?error=emptyfields&userid=".$username."&mail=".$email);
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location:  ../signup.php?error=invalidemailuserid");
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location:  ../signup.php?error=invalidemail&userid=".$username);
        exit();
    }
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location:  ../signup.php?error=invaliduserid&mail=".$email);
        exit();
    }
    elseif ($password !== $passwordConfirm ){
        header("Location:  ../signup.php?error=passwordcheck&userid=".$username."&mail=".$email);
        exit();
    }
    else {
        $sql = "SELECT nameuser FROM users WHERE nameuser=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location:  ../signup.php?error=sqlerror");
            exit();
        }
        else{ //passing only one string
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0) {
                header("Location:  ../signup.php?error=usertaken&mailid=".$email);
                exit();
            }
            else {
                $sql = "INSERT INTO users(nameuser, emailuser, pwduser) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location:  ../signup.php?error=sqlerror");
                    exit();
                }
                else {
                    $hashPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $username, $email,$hashPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location:  ../signup.php?signup=successful");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    }
    else {
        header("Location: ../signup.php");
        exit();
    }
