<?php
require_once('connection.php');
session_start();

// Get id from URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $Id = (int) $_GET['id'];

    $sql = "DELETE FROM details WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        die("Prepare failed: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "i", $Id);
    $exec = mysqli_stmt_execute($stmt);

    if ($exec) {
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            $_SESSION['delete_msg'] = "Your record has been deleted successfully. Please log in again.";
            session_destroy();
        } else {
            $_SESSION['delete_msg'] = "No record found to delete.";
        }
    } else {
        $_SESSION['delete_msg'] = "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
} else {
    $_SESSION['delete_msg'] ;
}

header("Location: ../login.php");
exit();
?>
