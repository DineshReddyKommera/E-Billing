<?php
include("connect.php");
session_start();
$uname = $_SESSION['varname']; 
$cname=$_GET['cname'];
$cno=$_GET['cno'];
$prods=$_GET['products'];
//$uname=$_GET['uname'];
$date= date("Y-m-d");

$sql2 = "SELECT * from customer_details where cname = '$cname' AND cno ='$cno'";
$result = $conn->query($sql2);
if ($result->num_rows == 0){
	$sql1 = "INSERT INTO customer_details (serial,cname,cno)
VALUES ('', '$cname', '$cno')";
 $conn->query($sql1);
}


$sql = "INSERT INTO transactions (trans_id,trans_date,prod_names,c_no,uname)
VALUES ('', '$date', '$prods', '$cno', '$uname')";
 if ($conn->query($sql) === TRUE){
	 header("location:dashboard.php");
 }
else
echo "<center><h1>Already Registered Please Contact Adminstrator.</h1><br>OR<br>Login To Download Invoice.</center>";


$conn->close();
?>