<?php
require_once('connection.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get the form data
        $name = $_POST['name'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rePassword = $_POST['re-password'];
        
    // print_r($_FILES['photo']);
    // die();
   
    if ($password !== $rePassword) {
        echo "Passwords do not match.";
        exit;
    }

   
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
      
        if ($_FILES['photo']['size'] > 2 * 1024 * 1024) {
            echo "Image size must be less than 2MB.";
            exit;
        }

        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $fileType = $_FILES['photo']['type'];
        if (!in_array($fileType, $allowedTypes)) {
            echo "Only JPG, PNG, and GIF files are allowed.";
            exit;
        }

       
        $timestamp = time();
        $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
        $imageName = $timestamp . "." . $extension;
        $targetDir = 'uploads/profile_pics/';
        $targetFilePath = $targetDir . $imageName;
        if (!file_exists($targetDir)) {
            if (!mkdir($targetDir, 0777, true)) {
                echo "Failed to create directory for profile images.";
                exit;
            }
        }
       
        if (!move_uploaded_file($_FILES['photo']['tmp_name'], $targetFilePath)) {
            echo "Error uploading the image.";
            exit;
        }
    } else {
        $imageName = ''; 
    }

  
    //$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    
    $sql = "INSERT INTO `details`(`name`, `dob`, `email`, `password`, `photo`) 
            VALUES('$name', '$dob', '$email', '$password', '$imageName')";

    if ($conn->query($sql) === TRUE) {
       header("Location: ../login.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
