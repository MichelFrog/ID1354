<?php
session_start();
include 'dbh.include.php';

$sql = "SELECT * FROM comments";
$result = mysqli_query($conn,$sql);
$comments = array();
$array = array();
$user = $_SESSION['userId'];
while(    $row = $result -> fetch_assoc()) {
$commentId = $row['userid'];
$sqlLogin = "SELECT * FROM users WHERE id='$commentId'";
$resultLogin = mysqli_query($conn,$sqlLogin);
if($row2 = $resultLogin -> fetch_assoc()) {
    $comments = array(
    'currentUser' => $user,
    'user' => $row2['nameuser'],
    'date' => $row['date'], 
    'message' => $row['message'],
    'id' => $row2['id'],
    'commentid' => $row['commentid']);
}
array_push($array, $comments);
}
echo json_encode($array);

?>