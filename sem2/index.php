<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <title>Home page - Tasty recipe</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div class="wrapper">
    <?php include 'includes/header.php'; ?>
        <section class="top-container-text">
            <h1>Welcome to Tasty  Recipes!</h1>
            <p class="p1">We'll help you plan your meals for the month
                with new, tasty and inspiring recipes for each day! Check out our calendar in the menu above! 
                <br> You can now create a new account and sign in using tab login/signup at the top!
            </p>
            <p class="p2">
                Use the navigationbar above to visit our calendar
                and recipes!</p> 
                <a class="cal-link" href="calendar.php">  Our food calendar!
                    <p id="calendar-click">Click to visit our calendar page! You will go to a new page.</p>
                </a>
        </section>
</div>
</body>           
</html>