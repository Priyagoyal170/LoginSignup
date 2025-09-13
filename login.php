<?php
session_start();

if (isset($_SESSION['delete_msg'])) {
    $msg = $_SESSION['delete_msg'];
    echo "<script>alert('" . addslashes($msg) . "');</script>";
    unset($_SESSION['delete_msg']);
}elseif(isset($_SESSION['passwordchange'])){
    $msg = $_SESSION['passwordchange'];
    echo "<script>alert('" . addslashes($msg) . "');</script>";
    unset($_SESSION['passwordchange']);
}elseif(isset($_SESSION['chekyourmail'])){
    $msg = $_SESSION['chekyourmail'];
    echo "<script>alert('" . addslashes($msg) . "');</script>";
    unset($_SESSION['chekyourmail']);
    
}elseif(isset($_SESSION['passwordmatch'])){
    $msg = $_SESSION['passwordmatch'];
    echo "<script>alert('" . addslashes($msg) . "');</script>";
    unset($_SESSION['passwordmatch']);
    
}elseif(isset($_SESSION['tokenExist'])){
    $msg = $_SESSION['tokenExist'];
    echo "<script>alert('" . addslashes($msg) . "');</script>";
    unset($_SESSION['tokenExist']);
    
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
    <form action="backend/loginCheck.php" method="post">
        <label for="email">Email Address:</label>
        <input type="email" name="email" id="email" style="width: 400px;" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

         <button type="submit">Log In</button>
        <p style="text-align:center;"> New user? <a href="signup.php">Register</a></p>
        <p style="text-align:center;"><a href="forget.php">Forget Password</a></p>
    </form>
</div>


</body>
</html>
