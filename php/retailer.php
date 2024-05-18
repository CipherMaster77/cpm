<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <style>
        .container {
            margin: 0 auto; /* Center the container horizontally */
            width: 80%; /* Set the width of the container */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px; /* Adjust font size */
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 6px; /* Reduced padding */
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<div class="container">

    <h2 style="text-align: center;">View Orders</h2>

    <table id="order-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th> <!-- Add column for action buttons -->
            </tr>
        </thead>
        <tbody>
            <?php
            // Establish database connection
            $con = mysqli_connect("localhost", "root", "", "user_db") or die("Couldn't connect");

            // Retrieve data from the database
            $sql = "SELECT customers.customer_id, customers.customer_name, customers.phone_number, customers.address, orders.product_name, orders.price, orders.quantity, orders.status 
                    FROM customers 
                    INNER JOIN orders ON customers.customer_id = orders.customer_id";
            $result = mysqli_query($con, $sql);

            // Display data in table rows
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $totalCost = $row['price'] * $row['quantity'];
                    echo "<tr>";
                    echo "<td>" . $row['customer_id'] . "</td>";
                    echo "<td>" . $row['customer_name'] . "</td>";
                    echo "<td>" . $row['phone_number'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "<td>" . $row['product_name'] . "</td>";
                    echo "<td>₱" . $row['price'] . "</td>";
                    echo "<td>" . $row['quantity'] . "</td>";
                    echo "<td>₱" . $totalCost . "</td>";
                    echo "<td id='status-" . $row['customer_id'] . "'>" . $row['status'] . "</td>"; // Status cell with unique ID
                    if ($row['status'] === 'Pending') {
                        echo "<td><button class='complete-button' data-order-id='" . $row['customer_id'] . "'>Complete Order</button></td>"; // Complete Order button
                    } else {
                        echo "<td>Order Completed</td>"; // Show "Order Completed" if status is not Pending
                    }
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='10'>No orders found</td></tr>";
            }

            // Close database connection
            mysqli_close($con);
            ?>
        </tbody>
    </table>

    <script>
        // Function to mark an order as complete
        function markOrderComplete(orderId) {
            // Send an AJAX request to update the order status
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // If the request is successful, update the status in the table
                        var statusCell = document.getElementById("status-" + orderId);
                        statusCell.textContent = "Complete";
                    } else {
                        // Handle error
                        console.error("Failed to mark order as complete.");
                    }
                }
            };
            xhr.open("POST", "mark_order_complete.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("orderId=" + orderId);
        }

        // Add event listeners to all Complete Order buttons
        var completeButtons = document.querySelectorAll(".complete-button");
        completeButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                var orderId = this.dataset.orderId;
                markOrderComplete(orderId);
            });
        });
    </script>

</div>

</body>
</html>
