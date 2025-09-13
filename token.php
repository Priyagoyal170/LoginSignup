<?php
require_once('backend/connection.php');
session_start();


$length = 16; // Desired length of the hexadecimal string (will be double the number of bytes)
$bytes = random_bytes($length / 2); // Generate half the number of bytes for the desired string length
$randomString = bin2hex($bytes);
echo "Random hexadecimal string: " . $randomString;
?>