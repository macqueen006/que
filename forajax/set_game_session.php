<?php

require_once('../functions/init.php');

$gameId = clean($_GET['gameId']);

$query  = " SELECT * FROM current_game WHERE id=$gameId ";
$result = Query($query);
confirm($result);

if($currentRow = fetch_data($result)){
    $game_category = $currentRow['category'];
    $game_sub_category = $currentRow['sub_category'];
    $game_stake = $currentRow['stake'];
}
//$_SESSION['game_category'] = $game_category;
//$_SESSION['game_sub_category'] = $game_sub_category;

$query = " SELECT * FROM game_categories WHERE title='$game_category' AND stake=$game_stake ";
$result = Query($query);
confirm($result);

while($row = fetch_data($result))
{
    $_SESSION['game_time'] = $row['game_time_in_secs'];
}

$date = date("Y-m-d H:i:s");

$_SESSION['end_time'] = date("Y-m-d H:i:s",strtotime($date."+$_SESSION[game_time] seconds"));
$_SESSION['game_start'] = "yes";