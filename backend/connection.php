<?php
//connect to the database
$insert = false;
$servername ="localhost";
$username = "root";
$password ="";
$database = "social network";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("Sorry we fail to connect: ". mysqli_connect_error());
}
else{
  //  echo "connection was successful";
}

?>