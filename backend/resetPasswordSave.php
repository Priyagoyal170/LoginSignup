<?php 
require_once('connection.php');
session_start();

$token = $_GET["token"];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $password = $_POST['password'];
        $rePassword = $_POST['re-password'];

        if ($password !== $rePassword) {
             echo "Passwords do not match.";
            $_SESSION['passwordmatch'] = "Passwords do not match.";
            header("Location: ../resetPassword.php?token=$token");
            exit;
        }           

        $sql ="SELECT * FROM `forgetpass` WHERE `token` = '$token'";
        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $sqlChangePassword = "UPDATE details SET password = '$password' WHERE email = '" . $row['email'] . "'";
            if ($conn->query($sqlChangePassword) === TRUE) {
            $deleteToken = "DELETE FROM forgetpass WHERE email = '" . $row['email'] . "'";
            $conn->query($deleteToken);
            $_SESSION['passwordchange'] = "Your password has been change successfully. Please log in again.";
            header("Location: ../login.php");
            exit;

            } else {
                $_SESSION['tokenexpire'] = "Your token expire or not found please fill the form again";
                header("Location: ../resetPassword.php");
                exit;
            }
        }
    }


?>