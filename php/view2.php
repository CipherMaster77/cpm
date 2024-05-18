<!-- view.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Stock Availability</h1>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity in Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Establish connection to the database
                $con = mysqli_connect("localhost", "root", "", "user_db") or die("Couldn't connect");

                // Query to fetch stock data
                $query = "SELECT * FROM stocks";
                $result = mysqli_query($con, $query);

                // Display stock data in table rows
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['product'] . "</td>";
                    echo "<td>" . $row['quantity'] . "</td>";
                    echo "</tr>";
                }

                // Close connection
                mysqli_close($con);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>