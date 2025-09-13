<?php
require_once('connection.php');
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $photo = $_POST['photo'];
  $name = $_POST['name'];
  $dob = $_POST['dob'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $repassword = $_POST['re-password'];
      if ($password !== $repassword) {
        echo "Passwords do not match.";
        exit;
    }
  
  $sql = "UPDATE `details` SET `photo` = '". $photo."', `name` = '".$name."',
   `dob` = '".$dob."', `email` = '".$email."', `password` = '".$password."' WHERE `id` = '".$id."' ";
  // sql query to be executed
  $result = mysqli_query($conn,$sql); 
  if($result){
    session_start();
    $_SESSION['update'] = "Your form has been update";
    header("Location: ../welcome.php");
  }
  else{
      echo "the record was not been succesfully submitted bcz of this error" . mysqli_error($conn);
  }
}
?>