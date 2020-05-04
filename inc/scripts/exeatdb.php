<?php
    $connectionError = "FAILD TO CONNECT TO DATABASE";
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "exeatdb";
    $conn = mysqli_connect($host, $username, $password, $db);

    if($conn){
        // echo "Connected Successfully";
    }else{
       echo $connectionError . mysqli_error($conn);
    }
?>