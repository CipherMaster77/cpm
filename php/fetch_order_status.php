<?php
// Establish database connection
$con = mysqli_connect("localhost", "root", "", "user_db") or die("Couldn't connect");

// Retrieve order statuses from the database
$sql = "SELECT id, status FROM orders";
$result = mysqli_query($con, $sql);

$orderStatuses = array();
while ($row = mysqli_fetch_assoc($result)) {
    $orderStatuses[$row['id']] = $row['status'];
}

// Close database connection
mysqli_close($con);

// Return order statuses as JSON
echo json_encode($orderStatuses);
?>
