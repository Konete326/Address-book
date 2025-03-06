<?php
include("connection.php");
$id = $_GET['id'];

$d_q = "DELETE FROM `users` WHERE id=$id";
$del = mysqli_query($con, $d_q);

if($del){
    echo "<script>alert('User deleted successfully'); window.location.href='view_users.php';</script>";
} else {
    echo "<script>alert('Failed to delete');</script>";
}
?>
