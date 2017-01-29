<?php
include("connect.php");
$pid=$_POST['pid'];
$pname=$_POST['pname'];
$sql = "INSERT INTO product_details (pid,pname)
VALUES ('$pid', '$pname')";
	if( $conn->query($sql) == true)
	{
		header('location:warehouse.php');
	}; 
?>