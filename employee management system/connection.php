<?php


    error_reporting(1);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "1new";

    $conn = mysqli_connect($servername, $username, $password, $dbname );

        if ($conn)
            {
                 //echo "Connection Is OK" ;
            }
        else 
            {
                echo "Connection Is Faild".mysqli_connect_error();
            }


?>