<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "myDB";

$connection = new mysqli($servername, $username, $password, $database);

if(!$connection) {
    die("connetion failed: " . $connetion->connect_error);
}
echo "Connected successfully";


$sql = "CREATE TABLE Users (
    username VARCHAR(50) PRIMARY KEY, 
    password VARCHAR(100) NOT NULL)";

if($connection->query($sql) === true) {
    echo "Table Users created successfully";
}
else {
    echo "Error creating table: " . $connection->error;
}

$connection->close();
?>