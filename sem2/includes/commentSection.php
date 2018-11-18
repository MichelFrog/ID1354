<?php 
    date_default_timezone_set('Europe/Stockholm'); 
    include 'includes/dbh.include.php';
    include 'includes/commentGet.php';
?>
<?php
if(isset($_SESSION['userId'])){
    echo "<form method='POST'  action='includes/commentConfrim.php'>
<input type='hidden' name='userid' value='".$_SESSION['userId']."'>
<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
<textarea class='text-for-comment'name='usercomment' placeholder='Enter your comment here..'></textarea><br>
<button type='submit' name='submit-comment'>Submit comment</button>
</form>";
}else { echo 'Please login to comment!';}
?>

