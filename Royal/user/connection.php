<?php
$hostname="localhost";
$username="root";
$password="";
$dbname="address_book";
$con=mysqli_connect($hostname,$username,$password,$dbname);
if(!$con){
echo mysqli_connect_error();
}
?>