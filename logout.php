<?php

    require_once('functions/init.php');
    session_destroy();

    if(isset($_COOKIE['loginID']))
    {
        unset($_COOKIE['loginID']);
        setcookie('loginID','', time() - 86400);
    }
    
    if(isset($_SESSION['loginID']))
    {
        $query = " SELECT * FROM users WHERE username='".$_SESSION['loginID']."' OR user_email='".$_SESSION['loginID']."' OR user_phone='".$_SESSION['loginID']."' ";
        $result = Query($query);
        confirm($result);

        if($row = fetch_data($result))
        {
            $dbUsername = $row['username'];

            $query = " SELECT * FROM online_status WHERE user=md5('$dbUsername') AND start=1 ";
            $result = Query($query);
            confirm($result);

            if(fetch_data($result))
            {
                $query = " UPDATE online_status SET start=0,end=1,date=now() ";
                $result = Query($query);
                confirm($result);
            }
        }

        unset($_SESSION['loginID']);
    }
    
    redirect("index.php");
    
?>