
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <style>
         body {
        background-image: url(https://image.slidesdocs.com/responsive-images/background/efficient-delivery-management-sorting-parcels-for-online-orders-powerpoint-background_31fea2e716__960_540.jpg);
        background-size: cover;
        color: black; /* Set text color to white */
    }
    .container {
        margin: 0 auto; /* Center the container horizontally */
        width: 80%; /* Set the width of the container */
    }
    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px; /* Adjust font size */
        background-color: gray; /* Add background color */
        color: white; /* Set text color to white */
    }
    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 6px; /* Reduced padding */
    }
    th {
        background-color: black;
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
                <th>Status</th> <!-- New column for order status -->
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
        }
    };
    xhr.send("customerId=" + customerId + "&status=" + status);
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
    background-image: url(https://image.slidesdocs.com/responsive-images/background/efficient-delivery-management-sorting-parcels-for-online-orders-powerpoint-background_31fea2e716__960_540.jpg);
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
            <li><a href="view.php">VIEW RETAIL</a></li>
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

