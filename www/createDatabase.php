<?php
$servername = "localhost";
$username = "root";
$password = "root";

$conn = mysqli_connect($servername, $username, $password);

if(!$conn) {
    die("connetion failed: " . mysqli_connect_error);
}
echo "Connected successfully";

$sql = "CREATE DATABASE myDB";

if($connection->query($sql) === true) {
    echo "Database created successfully";
}
else {
    echo "Error creating database: " . $connection->error;
}

$conn->close();
?>