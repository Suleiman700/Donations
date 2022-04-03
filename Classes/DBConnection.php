<?php

class DBConnection
{
    function db_connect(){
        $conn = mysqli_connect("localhost","root","","car_travel_history") or die("Couldn't connect");
        return $conn;
    }
}
?>
