<?php
//db stands for data base
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "loginsystemtut";

//creates the connection
$conn = mysqli_connect($serverName,$dBUsername,$dBPassword,$dBName);

if(!$conn) {
    //Checks if connection worked else gives an error message
    die("Connection failed: " . mysqli_connect_error());
}