<?php
include("connect.php");
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $conn->query("SELECT * FROM customer_details WHERE cno LIKE '%".$searchTerm."%'");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['cno'];
}
//return json data
echo json_encode($data);
$conn->close();
?>