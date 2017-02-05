<?php
include("connect.php");
if(isset($_POST["delete"]))
{
$pname=$_POST['pname'];
$uname="dinesh";
$sql = "DELETE FROM product_details WHERE  pname = '$pname' and uname ='$uname'";
}
elseif(isset($_POST["insert"]))
{
$pname=$_POST['pname'];
$pcost=$_POST['pcost'];
$uname="dinesh";
$sql = "INSERT INTO product_details (pname,pcost,uname)
VALUES ('$pname', '$pcost','$uname')";
}
elseif(isset($_POST["modify"]))
{
$pname=$_POST['pname'];
$pcost=$_POST['pcost'];
$uname="dinesh";
$sql = "UPDATE product_details SET pcost ='$pcost' where pname = '$pname' and uname ='$uname'";
}
	
if( $conn->query($sql) == true)
	{
		header('location:warehouse.php');
	}; 

?>