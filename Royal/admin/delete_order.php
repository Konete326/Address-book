<?php
include("connection.php");

$id = $_GET['id'];

$d_q = "DELETE FROM `orders` WHERE id = $id";
$del = mysqli_query($con, $d_q);

if ($del) {
    echo "<script>alert('Order deleted successfully'); window.location.href='view_orders.php';</script>";
} else {
    echo "<script>alert('Failed to delete order');</script>";
}
?>
