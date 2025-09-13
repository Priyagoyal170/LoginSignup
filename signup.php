<?php
session_start();

if (isset($_SESSION['usernotexist'])) {
    $msg = $_SESSION['usernotexist'];
    echo "<script>alert('". addslashes($msg) ."');</script>";
    unset($_SESSION['usernotexist']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Social Network</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<div class="form-container">
    <h2>Join Social Network</h2>
    <form action="backend/signupInsert.php" method="POST" enctype="multipart/form-data">
        <label for="photo">Upload Photo:</label>
        <input type="file" name="photo" id="photo" required>
        
        <label for="name">Full Name:</label>
        <input type="text" name="name" id="name" style="width: 400px;" required>
        
        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob" id="dob" style="width: 400px;" required>
        
        <label for="email">Email Address:</label>
        <input type="email" name="email" id="email" style="width: 400px;" required>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        
        <label for="re-password">Re-Password:</label>
        <input type="password" name="re-password" id="re-password" required>
    

       <!-- <a href="welcome.php"
       style="
     display: inline-block;
     padding: 10px 20px;
     background-color: #007bff;
     color: white;
     text-decoration: none;
     border-radius: 4px;
     cursor: pointer;
   ">Sign Up</a> -->

   <button type="submit">Sign Up</button>


    </form>
</div>


</body>
</html>
