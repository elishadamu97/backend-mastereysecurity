<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname  = 'paystack_database';

$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn){
    echo "Error in connection";
}

?>