<?php
// update_status.php

if (isset($_POST['customerId']) && isset($_POST['status'])) {
    $customerId = $_POST['customerId'];
    $status = $_POST['status'];

    // Establish database connection
    $con = mysqli_connect("localhost", "root", "", "user_db") or die("Couldn't connect");

    // Update the status in the database
    $sql = "UPDATE orders SET status = ? WHERE customer_id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $status, $customerId);

    if (mysqli_stmt_execute($stmt)) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status";
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($con);
} else {
    echo "Invalid request";
}
?>
