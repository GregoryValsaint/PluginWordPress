<?php

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "wordpress"; /* Database name */

$con = mysqli_connect("localhost","root", "", "wordpress");
// Check connection

var_dump($con);


if (!$con) {

 die("Connection failed: " . mysqli_connect_error());
}