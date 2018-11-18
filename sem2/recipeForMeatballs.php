<?php
$xml = simplexml_load_file('mycookbook/recipes.xml');
    $imgOfMeatballs = $xml->recipe[0]->imagepath;
    $ingredient = $xml->recipe[0]->ingredient;
    echo "<div class='title'>";
    echo $xml->recipe[0]->title;
    echo "</div>";
    echo "<img class='image' src='$imgOfMeatballs' alt='Picture of meatballs' />";
    echo "<div class='ingredients'>";
    for ($x = 0; $x < 7; $x++) {
    echo  $ingredient->li[$x]."<br>"; 
    }
    echo "</div>";
    echo "<div class='directions'>";
    for ($x = 0; $x < 6; $x++) {
    echo  $ingredient->li[$x]."<br>"; 
    }
    echo "</div>";
