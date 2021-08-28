<?php

$conn = new mysqli('localhost', 'root', '', 'ncc');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>