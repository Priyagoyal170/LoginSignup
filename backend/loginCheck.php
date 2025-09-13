<?php
require_once('connection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $email = $_POST['email'];
  $password =$_POST['password'];

  $sql = "SELECT * FROM details WHERE email='$email'";
  $result = mysqli_query($conn,$sql); 
  if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    if($password == $row['password']) {
        $_SESSION['id'] = $row['id'];
        header('Location: ../profile.php');
    }
    else{
        echo "Invalid Password <br>";

    }
  } 
  else{
      echo "No user found on this email <br>";
       echo '<a href="signup.php" class="btn btn-primary">Signup</a>';
  }
}

?>

