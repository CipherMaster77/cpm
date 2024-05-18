<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .notification {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>View Orders</h2>
        <div class="notification" id="notification"></div>
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
                </tr>
            </thead>
            <tbody>
                <?php
                // Establish database connection
                $con = mysqli_connect("localhost", "root", "", "user_db") or die("Couldn't connect");

                // Retrieve data from the database
                $sql = "SELECT customers.customer_id, customers.customer_name, customers.phone_number, customers.address, orders.product_name, orders.price, orders.quantity, orders.status FROM customers INNER JOIN orders ON customers.customer_id = orders.customer_id";
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
                        echo "<td>";
                        echo "<input type='checkbox' value='" . $row['customer_id'] . "' onclick='updateStatus(this)'" . ($row['status'] == 1 ? ' checked' : '') . ">";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No orders found</td></tr>";
                }

                // Close database connection
                mysqli_close($con);
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function updateStatus(checkbox) {
            var customerId = checkbox.value;
            var status = checkbox.checked ? 1 : 0;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_status.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log("Status updated successfully");
                    var notification = document.getElementById('notification');
                    if (status == 1) {
                        notification.innerHTML = "The order of customer ID " + customerId + " will arrive.";
                        notification.style.display = 'block';
                        setTimeout(function() {
                            notification.style.display = 'none';
                        }, 3000);
                    }
                } else if (xhr.readyState === 4) {
                    console.log("There was an error updating the status.");
                }
            };
            xhr.send("customerId=" + customerId + "&status=" + status);
        }

        // Check for new orders on page load
        window.onload = function() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "check_new_orders.php", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var newOrderCount = xhr.responseText;
                    if (newOrderCount > 0) {
                        var notification = document.getElementById('notification');
                        notification.innerHTML = "You have " + newOrderCount + " new order(s)!";
                        notification.style.display = 'block';
                    }
                }
            };
            xhr.send();
        };
    </script>
</body>
</html>