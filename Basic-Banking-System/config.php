<?php
    $server = "localhost";
    $user = "root";
    $password = "K!r@nD0n";
    $db = "sparksBank";

    $connection = mysqli_connect($server, $user, $password, $db);

    if($connection){
        // echo "Connection successful...";
    }else{
        echo "failed to connect...";
    }
?>