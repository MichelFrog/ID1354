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
</head>
<body>
<div class="wrapper">
        <?php require('includes/header.php'); ?>
            <section class="top-container-text">
            <?php require('recipeForPancakes.php'); ?>
                <div class="comments">
                <?php
                include 'includes/commentSection.php';
                ?>
                </div>
            </section>
    </div>
</body>
</html>