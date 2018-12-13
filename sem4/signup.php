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
    <script   src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous">
    </script>
    <script src="includes/logoutform.js"> </script>
    <script src="includes/loginform.js"> </script>
</head>
<body>
    <div class="wrapper">
         <?php require('includes/header.php'); ?>

         <div id=signup-grid>
            <h1>Signup</h1>
            <form class="signupForm" action="includes/signup.include.php" method="post">
                <input id="user" type="text" name="userid" placeholder="Username">
                <p>Enter a username.</p>
                <input id="mail" type="text" name="mailid" placeholder="Email adress">
                <p>Enter your E-mail.</p>
                <input id="pwd" type="password" name="pwd" placeholder="Password">
                <p>Enter a password.</p>
                <input id="pwdC" type="password" name="pwd-confirm" placeholder="Confirm password">
                <p>Enter the same password again.</p>
                <button id="signSubmit" type="submit" name="signup-submit">Confirm</button> 
                <div>
                    <p class="signupMsg"></p>            
                </div>
            </form>
            <script src="includes/signupform.js"> </script>
        </div>
    </div>
</body>
</html>       