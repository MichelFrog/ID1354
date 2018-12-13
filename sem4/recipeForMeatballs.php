<?php
$xml = simplexml_load_file('mycookbook/recipes.xml');
    $imgOfMeatballs = $xml->recipe[0]->imagepath;
    $ingredient = $xml->recipe[0]->ingredient;
    $direction = $xml->recipe[0]->directions;
    echo "<div class='title'>";
    echo $xml->recipe[0]->title;
    echo "</div>";
    echo "<img class='image' src='$imgOfMeatballs' alt='Picture of meatballs' />";
    echo "<div class='ingredients'>";
    echo $ingredient->getName()."<br>";
    for ($x = 0; $x < 7; $x++) {
    echo "<div class='dir'>";
    echo  $ingredient->li[$x]."<br>";
    echo "</div>";
    }
    echo "</div>";
    echo "<div class='directions'>";
    echo $direction->getName()."<br>";
    for ($x = 0; $x < 5; $x++) {
    echo "<div class='dir'>";
    echo  $direction->li[$x]."<br>"; 
    echo "</div>";
    }
    echo "</div>";
