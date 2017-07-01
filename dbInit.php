<?php
$servername = '127.0.0.1';
$username = 'root';
$password = 'root';

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$sql = "CREATE DATABASE QuoreTest";

if ($conn->query($sql) === TRUE) {
    echo "Created Succesfully";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();

$conn = new mysqli($servername, $username, $password, 'QuoreTest');

$sql = "CREATE TABLE Region (
Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Name VARCHAR(50) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Created Succesfully";
} else {
    echo "Error: " . $conn->error;
}

$sql = "CREATE TABLE Property (
Id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Name VARCHAR(50) NOT NULL,
Brand VARCHAR(25) NOT NULL,
Phone VARCHAR(25) NOT NULL,
URL VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Created Succesfully";
} else {
    echo "Error: " . $conn->error;
}

$conn->close()
?>
