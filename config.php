<?php
    $host = "https://pilonewsproject.000webhostapp.com/";

    $hostname = "localhost";
    $dbname = "id22077375_newsproject";
    $db_uname = "id22077375_newsproject";
    $db_pass = "Piyush@123";

    
    $conn = mysqli_connect($hostname,$db_uname,$db_pass,$dbname);

    if($conn)
    {
       // echo "Connection Successful...";
    }
    else
    {
        echo "Connection Failed...";
    }
?>