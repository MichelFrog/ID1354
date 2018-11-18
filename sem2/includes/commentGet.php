<?php
include 'dbh.include.php';

//Fetch comments then match the comment id with a user in the db
$sql = "SELECT * FROM comments";
$result = mysqli_query($conn,$sql);
while(    $row = $result -> fetch_assoc()) {
$commentId = $row['userid'];
$sqlLogin = "SELECT * FROM users WHERE id='$commentId'";
$resultLogin = mysqli_query($conn,$sqlLogin);
if($row2 = $resultLogin -> fetch_assoc()) {
    echo "<div class='all-comments'><p>";
        echo $row2['nameuser']."<br>";
        echo $row['date']."<br>";
        echo nl2br($row['message'])."<br><br>";
    echo "</p>";
    if(isset($_SESSION['userId'])){       
       if($_SESSION['userId'] == $row2['id']) {        
       echo "<form class='delete-comment' method='POST'  action='includes/commentDelete.php''>
            <input type='hidden' name='commentid' value='".$row['commentid']."'>
            <button class='delete-btn' type='submit' name='commentDelete' >Delete</button>
        </form>";
    }
}
echo "</div>";
}
}