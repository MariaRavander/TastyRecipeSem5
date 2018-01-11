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


$sql = "CREATE TABLE RecipeComments (
    page VARCHAR(50) NOT NULL, 
    comment VARCHAR(300) NOT NULL, 
    username VARCHAR(50) NOT NULL,
    timestamp DATETIME NOT NULL,
    PRIMARY KEY (page, timestamp))";

if($connection->query($sql) === true) {
    echo "Table Comments created successfully";
}
else {
    echo "Error creating table: " . $connection->error;
}

$connection->close();
?>