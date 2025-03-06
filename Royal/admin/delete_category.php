<?php
include("connection.php");

$id = $_GET['id'];

$d_q = "DELETE FROM `categories` WHERE id = $id";
$del = mysqli_query($con, $d_q);

if ($del) {
    echo "<script>alert('Category deleted successfully'); window.location.href='view_categories.php';</script>";
} else {
    echo "<script>alert('Failed to delete category');</script>";
}
?>
