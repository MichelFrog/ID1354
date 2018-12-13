<?php 
    date_default_timezone_set('Europe/Stockholm'); 
    include 'includes/dbh.include.php';
?>
<?php 
if(isset($_SESSION['userId'])){
    echo "<form id='commentForm' method='POST'  action='includes/commentConfrim.php'>
    <input id='user' type='hidden' name='userid' value='".$_SESSION['userId']."'>
    <input id='date' type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
    <textarea id='usercomment'class='text-for-comment'name='usercomment' placeholder='Enter your comment here..'></textarea><br>
    <button class='commentSubmit' type='submit' name='submit-comment'>Submit comment</button>
    <p class='commentMsg'></p>
</form>";
}else { echo 'Please login to comment!';}
?>

