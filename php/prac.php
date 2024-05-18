<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drink Ordering System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
        }

        .logo h1 {
            margin: 0;
            font-size: 24px;
        }

        .logout a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s;
        }

        .logout a:hover {
            color: #ccc;
        }

        .menu-section,
        .order-section {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .menu-section {
            margin-bottom: 20px;
        }

        .menu-table {
            width: 100%;
            border-collapse: collapse;
        }

        .menu-table th,
        .menu-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .menu-table th {
            background-color: #333;
            color: #fff;
        }

        .product-image {
            max-width: 40px;
            max-height: 40px;
        }

        .order-form {
            max-width: 500px;
        }

        .order-form table {
            width: 100%;
            border-collapse: collapse;
        }

        .order-form th,
        .order-form td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .order-form th {
            background-color: #333;
            color: #fff;
        }

        .order-form input[type="text"],
        .order-form input[type="number"],
        .order-form select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .order-form button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .order-form button:hover {
            background-color: #555;
        }

        .remove-button {
            background-color: #f44336;
            color: #fff;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .remove-button:hover {
            background-color: #d32f2f;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <h1>Drink Ordering System</h1>
        </div>
        <div class="logout">
            <a href="retail_index.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </header>

    <div class="container">
        <div class="menu-section">
            <h2>Drink Menu</h2>
            <table class="menu-table">
                <thead>
                    <tr>
                        <th>Drink</th>
                        <th>Price</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ROYAL</td>
                        <td>₱15.00</td>
                        <td><img src="ro.webp" alt="Royal" class="product-image"></td>
                    </tr>
                    <tr>
                        <td>COKE</td>
                        <td>₱15.00</td>
                        <td><img src="c.webp" alt="Coke" class="product-image"></td>
                    </tr>
                    <tr>
                        <td>SPRITE</td>
                        <td>₱15.00</td>
                        <td><img src="l.jpeg" alt="Sprite" class="product-image"></td>
                    </tr>
                    <tr>
                        <td>C2</td>
                        <td>₱15.00</td>
                        <td><img src="c2.jpg" alt="C2" class="product-image"></td>
                    </tr>
                    <tr>
                        <td>Jack Daniels</td>
                        <td>₱70.00</td>
                        <td><img src="mt.png" alt="Jack Daniels" class="product-image"></td>
                    </tr>
                    <tr>
                        <td>Root Beer</td>
                        <td>₱70.00</td>
                        <td><img src="pe.webp" alt="Root Beer" class="product-image"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="order-section">
            <h2>Order Form</h2>
            <form id="order-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="order-form">
                    <table>
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select class="product-name" name="product_name[]">
                                        <option value="ROYAL">ROYAL</option>
                                        <option value="COKE">COKE</option>
                                        <option value="SPRITE">SPRITE</option>
                                        <option value="C2">C2</option>
                                        <option value="Jack Daniels">Jack Daniels</option>
                                        <option value="Root Beer">Root Beer</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="product-price" name="product_price[]">
                                        <option value="15">₱15.00</option>
                                        <option value="70">₱70.00</option>
                                    </select>
                                </td>
                                <td><input type="number" class="product-quantity" name="product_quantity[]" value="1" min="1"></td>
                                <td><button type="button" class="remove-button" onclick="removeRow(this)">Remove</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" id="add-button" onclick="addRow()">Add Item</button>
                    <br><br>
                    <label for="customer-name">Customer Name:</label>
                    <input type="text" id="customer-name" name="customer_name" required>
                    <br><br>
                    <label for="phone-number">Phone Number:</label>
                    <input type="text" id="phone-number" name="phone_number" required>
                    <br><br>
                    <label for="address">Complete Address:</label>
                    <input type="text" id="address" name="address" required>
                    <br><br>
                    <button type="submit" class="order-button">Submit Order</button>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2023 Drink Ordering System. All rights reserved.</p>
    </footer>

    <script>
        function addRow() {
            var newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>
                    <select class="product-name" name="product_name[]">
                        <option value="ROYAL">ROYAL</option>
                        <option value="COKE">COKE</option>
                        <option value="SPRITE">SPRITE</option>
                        <option value="C2">C2</option>
                        <option value="Jack Daniels">Jack Daniels</option>
                        <option value="Root Beer">Root Beer</option>
                    </select>
                </td>
                <td>
                    <select class="product-price" name="product_price[]">
                        <option value="15">₱15.00</option>
                        <option value="70">₱70.00</option>
                    </select>
                </td>
                <td><input type="number" class="product-quantity" name="product_quantity[]" value="1" min="1"></td>
                <td><button type="button" class="remove-button" onclick="removeRow(this)">Remove</button></td>
            `;
            document.querySelector('.order-form table tbody').appendChild(newRow);
        }

        function removeRow(button) {
            button.parentNode.parentNode.remove();
        }
    </script>
</body>
</html>


<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order Page</title>
        <style>
        .container {
            width: 80%;
            margin: 20px auto;
        }
        h1, h2 {
            text-align: center;
            background-color: white;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: white;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
            color: black;
        }
        th {
            background-color: white;
        }
        </style>
    </head>
    <body>
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
    </body>
    </html>

