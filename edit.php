<?php
require_once('backend/connection.php');

// $id = $_GET['id'];
// $sql = "SELECT * FROM `details` WHERE id =  $id ";
// $result = mysqli_query($conn,$sql);
// $row = mysqli_fetch_assoc($result);
// print_r($row);
// die();
session_start();
if(!isset($_SESSION['id'])){
    header("Location:login.php");
    exit();
}
     $Id = $_SESSION['id'];
    $sql ="SELECT * FROM `details` WHERE id = $Id";
    $result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>


<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.rtl.min.css" rel="stylesheet" integrity="sha384-CfCrinSRH2IR6a4e6fy2q6ioOX7O6Mtm1L9vRvFZ1trBncWmMePhzvafv7oIcWiW" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/2.3.3/css/dataTables.dataTables.min.css">

  <title>social network</title>
</head>
<body>



<div class="container my-4 ">
    <h1>Details of user</h1>
    <form action="backend/update.php?id=<?php echo $row['id'] ?>" method ="POST">
    <br>
    <form action="welcome.php" action="POST">
  <div class="mb-2">
    <label for="title" class="form-label">Upload photo</label>
    <input type="text" class="form-control" value="<?php echo $row['photo'] ?>" name="photo" id="photo" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="desc">
      <label for="floatingTextarea">Name</label>
  <textarea class="form-control" name="name" id="name"><?php echo $row['name'] ?></textarea><br>
</div>
<div class="desc">
    <label for="floatingTextarea">Date of Birth</label>
<textarea class="form-control" name="dob" id="dob"><?php echo $row['dob'] ?></textarea><br>
</div>
  <div class="desc">
      <label for="floatingTextarea">Email</label>
  <textarea class="form-control" name="email" id="email"><?php echo $row['email'] ?></textarea><br>
</div>
  <div class="desc">
      <label for="floatingTextarea">Password</label>
  <textarea class="form-control" name="password" id="password"><?php echo $row['password'] ?></textarea><br>
</div>
  <div class="desc">
      <label for="floatingTextarea">Re-Password</label>
  <textarea class="form-control" name="re-password" id="re-password"><?php echo $row['password'] ?></textarea><br>
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</div>
<hr>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous">
    $(document).ready(function() {
    $('#myTable').DataTable();
  });
  </script> -->

  <!-- 1. jQuery (must be loaded before DataTables) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="..." crossorigin="anonymous"></script>

<!-- 2. DataTables JS (required for .DataTable functionality) -->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

<!-- 3. Your initialization script, placed afterward -->
<script>
  $(document).ready(function() {
    $('#myTable').DataTable();
  });
</script>

</body>
</html>
