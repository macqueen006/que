<?php

require_once('functions/init.php');

$query = " SELECT * FROM users WHERE user_id=22 ";
$result = Query($query);
confirm($result);

if($row = fetch_data($result))
{
    echo $row['date'];
    echo '<br>';
    echo '<br>';

    $createdDate = strtotime($row['date']);
    $oneWeek = strtotime('-1 week');

    if($createdDate > $oneWeek)
    {
        //it's sooner than one week
        $TimeLeft = $createdDate - $oneWeek;
        $DaysLeft = floor($TimeLeft / 86400); // 86400 = seconds per day
        $HoursLeft = floor(($TimeLeft - $DaysLeft * 86400) / 3600); // 3600 = seconds per hour

        echo "Still $DaysLeft days(s), $HoursLeft hour(s) to go";
    }
    else
    {
        echo error_validation("EXPIRED");
    }
}
else
{
    echo 'row not found';
}