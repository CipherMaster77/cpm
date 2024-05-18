<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a href="retail_index.php" id="logout-button">Logout</a>
    <title>Drink Ordering System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        #menu-table table {
            width: 50%;
            border-collapse: collapse;
            margin-bottom: 20px;
            float: left; /* Float the menu table to the left */ 
        }

        #order-form {
            width: 40%; /* Set the width of the order form */
            float: left; /* Float the order form to the left */
            margin-left: 20px; /* Add some space between the menu and order form */
        }

        #order-form table {
            width: 100%; /* Make the order form table take full width of its container */
        }

        #order-form th {
            text-align: left; /* Align the table headers to the left */
        }

        #order-form .order-button {
            display: block; /* Make the button a block element to take full width */
            width: 25%; /* Set button width to full */
        }

        #menu-table th,
        #menu-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        .product-image {
            max-width: 40px;
            max-height: 40px;
        }
        h1 {
            margin-left: 300px; /* Adjust margin to move the heading to the right */
        }
        #logout-button {
            position: absolute;
            top: 10px; 
            right: 10px;
            transform: translateX(10%);
            background-color: #f44336; /* Red background color */
            color: white; /* White text color */
            padding: 10px 20px; /* Padding around the text */
            border: none; /* Remove button border */
            border-radius: 5px; /* Add border radius for rounded corners */
            cursor: pointer; /* Change cursor to pointer on hover */
            font-size: 16px; /* Set font size */
            text-decoration: none; /* Remove default underline */
            transition: background-color 0.3s; /* Smooth background color transition */
        }

        /* Hover effect */
        #logout-button:hover {
            background-color: #d32f2f; /* Darker red on hover */
        }

    </style>
</head>
<body>
    <h1>Drink Menu</h1>
    <div id="menu-table">
        <table>
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
    
</body>
</html>


    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
</head>
<body>
<style> 
#order-table {
    border-collapse: separate;
    border-spacing: 5px;
}

#order-table th,
#order-table td {
    border: 1px solid black;
    padding: 8px;
}
h2 {
    margin-left: 200px;
}

</style>

<?php
// Establish database connection
$con = mysqli_connect("localhost", "root", "", "user_db") or die("Couldn't connect");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $customerName = $_POST['customer_name'];
    $phoneNumber = $_POST['phone_number'];
    $address = $_POST['address'];
    $productNames = $_POST['product_name'];
    $productPrices = $_POST['product_price'];
    $productQuantities = $_POST['product_quantity'];

    // Insert customer information into the database
    $customerSql = "INSERT INTO customers (customer_name, phone_number, address) VALUES ('$customerName', '$phoneNumber', '$address')";
    mysqli_query($con, $customerSql);
    $customerId = mysqli_insert_id($con);

    // Insert product details into the database
    foreach ($productNames as $index => $productName) {
        $price = $productPrices[$index];
        $quantity = $productQuantities[$index];
        $productSql = "INSERT INTO orders (customer_id, product_name, price, quantity) VALUES ('$customerId', '$productName', '$price', '$quantity')";
        mysqli_query($con, $productSql);
    }

    
    header("Location: view.php");
    exit();
}
?>
<div id="order-form">
    <h2>Order Form</h2>
    <form id="order-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table id="order-table">
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
        <label>Customer Name: </label><input type="text" id="customer-name" name="customer_name"><br>
        <label>Phone Number: </label><input type="text" id="phone-number" name="phone_number"><br>
        <label>Complete Address: </label><input type="text" id="address" name="address"><br>
        <button type="submit" class="order-button">Submit Order</button>
        
    </form>
</div>

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
        document.getElementById('order-table').appendChild(newRow);
    }

    function removeRow(button) {
        button.parentNode.parentNode.remove();
    }

    // Function to display alert on form submission
    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally

        // Prepare form data for submission
        var formData = new FormData(this);

        // Send form data to the server using AJAX
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    alert('Order submitted successfully.');
                    location.reload(); // Refresh the page after successful submission
                } else {
                    alert('Failed to submit order. Please try again.');
                }
            }
        };
        xhr.open("POST", "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>", true);
        xhr.send(formData);
    });
</script>

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

<div class="container">
    <div class="sidebar" id="mySidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <ul>
            <li><a href="order.php">ORDER PRODUCT</a></li>
            <li><a href="view.php">VIEW ORDER</a></li>
        </ul>
    </div>

    <div id="main">
        <button class="openbtn" onclick="openNav()">☰ VIEW</button>
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

