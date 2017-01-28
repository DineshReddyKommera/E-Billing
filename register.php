<?php
include("connect.php");

$uname=$_POST['uname'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$org=$_POST['org'];
$add=$_POST['add'];
$mobile=$_POST['mno'];
$pwd=$_POST['pwd'];




$sql = "INSERT INTO user_details (uname, fname, lname, org, address, mobile, password)
VALUES ('$uname', '$fname', '$lname', '$org', '$add', '$mobile', '$pwd')";


	 if ($conn->query($sql) === TRUE){
		 session_start();
		 $_SESSION['varname'] = $uname;
		 $_SESSION['orgname']=$org;
   		  header("location:dashboard.php");
		 
	}

else {
	      //echo "Unsuccessful Please try to Register again";
		  //echo "<a href=\"index.php\">Back</a>";
		  header('location:invalid.php');
}


$conn->close();
?>