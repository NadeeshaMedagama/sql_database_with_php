<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "1234";
$db_name = "data_php";
$conn = "";

try {

    $conn = mysqli_connect("$db_server",
                            "$db_user",
                            "$db_pass",
                            "$db_name");

}catch (mysqli_sql_exception $e){

    echo ("Could not connected! <br>");

}

