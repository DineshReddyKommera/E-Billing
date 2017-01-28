<?php
session_start();
include("connect.php");
$uname=$_POST['uname'];
$pwd=$_POST['pwd'];
$log="true";

/*if($uname =="admin"&& $pwd=="admin")
{
 $_SESSION['varname'] = $uname;
 header('location:index.php');
 die();
}*/
$sql1 = "SELECT org FROM user_details WHERE uname = '$uname'";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $_SESSION['orgname']=$row["org"];
    }
} 
$sql = "SELECT * FROM user_details WHERE uname = '$uname' AND password ='$pwd'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	
	$_SESSION['varname'] = $uname;
	
    header('location:dashboard.php');
    }
else
header('location:invalid.php');

$conn->close();
?>