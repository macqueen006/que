<?php
require_once('../functions/init.php');

$PostId = $_GET['postId'];

$username = $_SESSION['loginID'];
$query = " SELECT * FROM users WHERE username='".$username."' OR user_phone='".$username."' OR user_email='".$username."' ";
$result = Query($query);

if($row = fetch_data($result)){
    $dbUsername = $row['username'];
}

$query = " SELECT * FROM likes WHERE post_id=$PostId AND author='$dbUsername' ";
$result = Query($query);
confirm($result);

if(!fetch_data($result)){
    $query = " INSERT INTO likes(post_id,author,date) VALUES($PostId,'$dbUsername',now()) ";
    $result = Query($query);
    confirm($result);

    $query = " UPDATE forum SET like_count=like_count+1 WHERE id=$PostId ";
    $result = Query($query);
    confirm($result);
}
//else{
//    $query = " DELETE FROM likes WHERE author='$dbUsername' AND post_id=$PostId ";
//    $result = Query($query);
//    confirm($result);
//
//    $query = " UPDATE forum SET like_count=like_count-1 WHERE id=$PostId ";
//    $result = Query($query);
//    confirm($result);
//}