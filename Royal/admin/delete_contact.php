<?php
include('header.php');
include('connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $delete_query = "DELETE FROM contacts WHERE id='$id'";
    
    if (mysqli_query($con, $delete_query)) {
        echo "<script>alert('Contact deleted successfully!'); window.location.href='view_contact.php';</script>";
    } else {
        echo "<script>alert('Error deleting contact!'); window.location.href='view_contact.php';</script>";
    }
} else {
    header('location: view_contact.php');
}
?>