<?php
session_start();

if (isset($_SESSION['tokenexpire'])) {
    $msg = $_SESSION['tokenexpire'];
    echo "<script>alert('". addslashes($msg) ."');</script>";
    unset($_SESSION['tokenexpire']);
}elseif(isset($_SESSION['passwordmatch'])){
    $msg = $_SESSION['passwordmatch'];
    echo "<script>alert('". addslashes($msg) ."');</script>";
    unset($_SESSION['passwordmatch']);
}
?>
    
<?php $token = $_GET['token']; ?>
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
    <form action="backend/resetPasswordSave.php?token=<?php echo $token ?>" method="post">
        <label for="email">New Password:</label>
        <input type="password" name="password" id="password" style="width: 400px;" required>
        <label for="password">Confirm Password</label>
        <input type="password" name="re-password" id="re-password" style="width: 400px;" required>
         <button type="submit">Submit</button>
        <p style="text-align:center;"> New user? <a href="signup.php">Register</a></p>
    </form>
</div>


</body>
</html>
