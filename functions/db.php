<?php

    $dbservername = 'localhost';
    $dbusername = 'root';
    $dbpassword = '';
    $dbname = 'q-tech';

    $con = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

    if(!$con)
    {
        echo 'We\'re experiencing connection issues, Please Try again Later...';
    }

    // Function Clean String Values
    function escape($string)
    {
        global $con;
        return mysqli_real_escape_string($con,$string);
    }

    // Query Functions
    function Query($query)
    {
        global $con;
        return mysqli_query($con,$query);
    }

    // Confirmation Function
    function confirm($result)
    {
        global $con;
        if(!$result)
        {
            die('Query Failed ' . mysqli_error($con));
        }
    }

    // Fetch Data from Database
    function fetch_data($result)
    {
        return mysqli_fetch_assoc($result);
    }

    // Fetch Array from Database
    function fetch_array($array)
    {
        return mysqli_fetch_array($array);
    }

    // Row Values from Database
    function row_count($count)
    {
        return mysqli_num_rows($count);
    }

?>