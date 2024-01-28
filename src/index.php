<?php

$host     = getenv("MYSQL_HOSTNAME");
$port     = 3306;
$socket   = "";
$user     = getenv("MYSQL_USER");
$password = getenv("MYSQL_PASSWORD");
$dbname   = getenv("MYSQL_DATABASE");

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
  or die('Could not connect to the database server' . mysqli_connect_error());

print_r($con);

$con->close();
