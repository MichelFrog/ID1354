<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/> 
    <title>Delicious pancakes! - Tasty recipe</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="wrapper">
         <?php require('includes/header.php'); ?>

         <div id=signup-grid>
            <h1>Signup</h1>
            <form action="includes/signup.include.php" method="post">
                <input type="text" name="userid" placeholder="Username">
                <p>Enter a username.</p>
                <input type="text" name="mailid" placeholder="Email adress">
                <p>Enter your E-mail.</p>
                <input type="password" name="pwd" placeholder="Password">
                <p>Enter a password.</p>
                <input type="password" name="pwd-confirm" placeholder="Confirm password">
                <p>Enter the same password again.</p>
                <button type="submit" name="signup-submit">Confirm</button>            
            </form>
        </div>
    </div>
</body>
</html>       