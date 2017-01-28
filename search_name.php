<?php
include("connect.php");
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $conn->query("SELECT * FROM customer_details WHERE cname LIKE '%".$searchTerm."%' ORDER BY cname ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['cname'];
}
//return json data
echo json_encode($data);
$conn->close();
?>