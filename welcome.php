<?php
session_start();
if(!isset($_SESSION['id'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome Page</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background: linear-gradient(to right, #667eea, #764ba2);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #fff;
    }

    .welcome-container {
      background-color: rgba(255, 255, 255, 0.1);
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      text-align: center;
      width: 90%;
      max-width: 400px;
    }

    h2 {
      font-size: 26px;
      margin-bottom: 20px;
    }

    .buttons {
      margin-top: 20px;
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .btn {
      padding: 12px 20px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s;
      text-decoration: none;
      color: #fff;
      background-color: #4e73df;
    }

    .btn:hover {
      background-color: #2e59d9;
    }

    @media (min-width: 480px) {
      .buttons {
        flex-direction: row;
        justify-content: center;
      }
    }
  </style>
</head>
<body>

  <div class="welcome-container">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['id']); ?>!</h2>

    <div class="buttons">
      <a href="profile.php" class="btn">Profile</a>
      <a href="backend/logout.php" class="btn">Logout</a>
    </div>
  </div>

</body>
</html>
