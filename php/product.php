<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            font-size: bold;
            font-weight: bold;
        }
        h2{
            font-weight: bold;
        }

        .table {
            margin-bottom: 0;
        }

        .table th {
            background-color: #e9ecef;
            color: #343a40;
            font-weight: 600;
        }

        .btn {
            transition: background-color 0.3s ease;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
        }

        .total-cost {
            font-weight: 600;
            color: #343a40;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">PRODUCT LIST</h2>
        <?php
        // Database connection
        $con = mysqli_connect("localhost", "root", "", "user_db") or die("Couldn't connect");

        // Delete product if delete_product parameter is set
        if (isset($_POST['delete_product'])) {
            $productId = $_POST['delete_product'];
            // Perform deletion query
            $deleteQuery = "DELETE FROM products WHERE id = '$productId'";
            mysqli_query($con, $deleteQuery);
        }

        // Update product if update_product_id parameter is set
        if (isset($_POST['update_product_id'])) {
            $productId = $_POST['update_product_id'];
            $newPrice = $_POST['new_price'];
            $newQuantity = $_POST['new_quantity'];
            // Perform update query
            $updateQuery = "UPDATE products SET price = '$newPrice', quantity = '$newQuantity' WHERE id = '$productId'";
            mysqli_query($con, $updateQuery);
        }

        // Fetch products from the database after delete/update
        $query = "SELECT * FROM products";
        $result = mysqli_query($con, $query);

        // Check if products exist
        if (mysqli_num_rows($result) > 0) {
            echo '<table class="table table-striped">';
            echo '<thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Cost</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';

            // Initialize total cost variable
            $totalCost = 0;

            // Fetch products data and display in table
            while ($row = mysqli_fetch_assoc($result)) {
                // Check if the product name is encrypted
                if (strpos($row['product_name'], 'ENC_') !== false) {
                    $productName = 'Default Product'; // Set a default name if the product name is encrypted
                } else {
                    $productName = $row['product_name']; // Use the original product name if not encrypted
                }

                $productCost = $row['price'] * $row['quantity']; // Calculate individual product cost
                $totalCost += $productCost; // Add to total cost

                echo '<tr>
                        <td>' . $productName . '</td>
                        <td>' . $row['price'] . '</td>
                        <td>' . $row['quantity'] . '</td>
                        <td>' . $productCost . '</td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="deleteProduct(' . $row['id'] . ')"><i class="fas fa-trash"></i></button>
                            <button class="btn btn-primary btn-sm" onclick="updateProduct(' . $row['id'] . ')"><i class="fas fa-edit"></i></button>
                        </td>
                    </tr>';
            }

            // Display total cost row
            echo '<tr>
                    <td colspan="3" class="total-cost">Total Cost:</td>
                    <td class="total-cost">' . $totalCost . '</td>
                    <td></td>
                </tr>';

            echo '</tbody></table>';
        } else {
            echo '<p class="text-center">No products found.</p>';
        }

        // Close database connection
        mysqli_close($con);
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // JavaScript functions for AJAX requests
        function deleteProduct(productId) {
            if (confirm("Are you sure you want to delete this product?")) {
                $.ajax({
                    type: "POST",
                    url: "",
                    data: { delete_product: productId },
                    success: function() {
                        location.reload();
                    }
                });
            }
        }

        function updateProduct(productId) {
            var newPrice = prompt("Enter the updated price:");
            var newQuantity = prompt("Enter the updated quantity:");

            if (newPrice !== null && newQuantity !== null) {
                $.ajax({
                    type: "POST",
                    url: "",
                    data: {
                        update_product_id: productId,
                        new_price: newPrice,
                        new_quantity: newQuantity
                    },
                    success: function() {
                        location.reload();
                    }
                });
            }
        }
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ADMIN</title>
<style>
/* Global Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    background-size: cover;
}

.container {
    position: relative;
}

/* Sidebar Styles */
.sidebar {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent black */
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidebar ul {
    list-style: none; 
    padding: 0;
    margin: 0;
}

.sidebar li a {
    padding: 15px 20px; /* Increased padding */
    text-decoration: none;
    font-size: 18px; 
    color: white;
    display: block;
    transition: 0.3s;
}

.sidebar li a:hover {
    background-color: rgba(255, 255, 255, 0.15); 
}

.sidebar .closebtn {
    position: absolute;
    top: 15px; /* Adjusted position */
    right: 35px; /* Adjusted position */
    font-size: 36px;
    margin-left: 50px;
    color: white;
}

/* Button Styles */
.openbtn {
    font-size: 15px;
    cursor: pointer;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    border: none;
    color: white;
    padding: 12px 18px;
    position: fixed;
    top: 20px;
    left: 10px;
    z-index: 2;
    transition: 0.3s;
    border-radius: 5px;
}

.openbtn:hover {
    background-color: rgba(0, 0, 0, 0.7); 
}

/* Main Content Styles */
#main {
    transition: margin-left 0.5s;
    padding: 16px;
}
</style>
</head>
<body>
    </body>
</html>

<div class="container">
    <div class="sidebar" id="mySidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <ul>
            <li><a href="home.php">HOME</a></li>
            <li><a href="supplier.php">SUPPLIER</a></li>
            <li><a href="inventory.php">INVENTORY</a></li>
            <li><a href="product.php">VIEW PRODUCT</a></li>
            <li><a href="view_order.php">VIEW RETAIL</a></li>
            <li><a href="invoice.php">INVOICE</a></li>
        </ul>
    </div>

    <div id="main">
        <button class="openbtn" onclick="openNav()">☰ ADMIN VIEW</button>
    </div>
</div>

<script>
function openNav() {
    document.getElementById("mySidebar").style.width = "250px"; 
}

function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
}
</script>

</body>
</html>

