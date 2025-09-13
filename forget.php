<?php
session_start();

if (isset($_SESSION['delete_msg'])) {
    $msg = $_SESSION['delete_msg'];
    echo "<script>alert('". addslashes($msg) ."');</script>";
    unset($_SESSION['delete_msg']); // clear message after showing
}

session_destroy();
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
    <form action="backend/forgetPass.php" method="post">
        <label for="email">Email Address:</label>
        <input type="email" name="email" id="email" style="width: 400px;" required>
         <button type="submit">Submit</button>
        <p style="text-align:center;"> New user? <a href="signup.php">Register</a></p>
    </form>
</div>


</body>
</html>
