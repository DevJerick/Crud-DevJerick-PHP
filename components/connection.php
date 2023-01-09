<?php 

$username = "root";
$password = "";
$server = "localhost";
$database = "crud";

$con = mysqli_connect($server,$username,$password,$database);

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL:". mysqli_connect_errno();
}

?>