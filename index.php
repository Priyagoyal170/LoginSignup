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

if ($row) {
    // Proceed with displaying the form
    ?>
    <div class="container my-4">
        <h1>Details of user</h1>
        <form action="welcome.php" method="POST">
            <div class="mb-2">
                <label for="photo" class="form-label">Upload photo</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($row['photo']); ?>" name="photo" id="photo">
            </div>
            <div class="mb-2">
                <label for="name" class="form-label">Name</label>
                <textarea class="form-control" name="name" id="name"><?php echo htmlspecialchars($row['name']); ?></textarea>
            </div>
            <div class="mb-2">
                <label for="dob" class="form-label">Date of Birth</label>
                <textarea class="form-control" name="dob" id="dob"><?php echo htmlspecialchars($row['dob']); ?></textarea>
            </div>
            <div class="mb-2">
                <label for="email" class="form-label">Email</label>
                <textarea class="form-control" name="email" id="email"><?php echo htmlspecialchars($row['email']); ?></textarea>
            </div>
            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> 
             <!-- <a href="backend/delete.php?id=$row['id']">Delete</a> -->
             <a href="backend/delete.php?id=<?php echo $row['id']; ?>">Delete</a>
        </form>
    </div>
    <?php
} else {
    echo "<p>User not found.</p>";
}
?>
