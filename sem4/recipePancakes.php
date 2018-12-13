<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <title>Delicious pancake recipe!</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="nav.css">   
    <link rel="stylesheet" href="recipe.css">
    <script   src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
              crossorigin="anonymous">
    </script>
    <script src="includes/commentform.js"> </script>
    <script src="includes/logoutform.js"> </script>
    <script src="includes/loginform.js"> </script>
</head>
<body>
<div class="wrapper">
<div class="wrapper">
        <?php require('includes/header.php'); ?>
            <section class="top-container-text">
            <?php require('recipeForPancakes.php'); ?>
            <div class="loadcomments"></div>
                <div class="comments">
                <?php require('includes/commentSection.php');?>
                </div>
            </section>
    </div>
</body>
</html>