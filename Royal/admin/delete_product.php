<?php
include("connection.php");

$id = $_GET['id'];

$s_q = "SELECT image_url FROM products WHERE id = $id";
$result = mysqli_query($con, $s_q);

if ($result && mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
    $image_path = $data['image_url'];

    $d_q = "DELETE FROM `products` WHERE id = $id";
    if (mysqli_query($con, $d_q)) {
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        echo "<script>alert('Product deleted successfully'); window.location.href='view_products.php';</script>";
    } else {
        echo "<script>alert('Failed to delete product');</script>";
    }
} else {
    echo "<script>alert('Product not found');</script>";
}
?>
