<?php
require_once('backend/connection.php');

session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$Id = $_SESSION['id'];
$sql = "SELECT * FROM `details` WHERE id = $Id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Profile Page</title>
  <link rel="stylesheet" href="loginpage.css">
</head>
<body>

  <div class="profile-card">
    <img src="backend/uploads/profile_pics/<?php echo htmlspecialchars($row['photo']); ?>" alt="Profile Image" class="profile-img" />
    <div class="profile-name"><?php echo htmlspecialchars($row['name']); ?></div>
    <div class="profile-info">
      <div class="info-item"><span class="label">Date of Birth:</span><span class="value"><?php echo htmlspecialchars($row['dob']); ?></span></div>
      <div class="info-item"><span class="label">Email:</span><span class="value"><?php echo htmlspecialchars($row['email']); ?>m</span></div>
      <div class="info-item"><span class="label">About:</span><span class="value">Software Developer with a love for clean code and coffee ☕</span></div>
    </div>
    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> 
     <!-- <a href="backend/delete.php?id=$row['id']">Delete</a> -->
     <a href="backend/delete.php?id=<?php echo $row['id']; ?>">Delete</a>
  </div>
</body>
</html>
