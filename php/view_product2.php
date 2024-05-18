<?php
// Establish database connection
$con = mysqli_connect("localhost", "root", "", "user_db") or die("Couldn't connect");

// Check if the form is submitted for deleting a product
if (isset($_POST['delete'])) {
    // Get the product ID to be deleted
    $product_id = $_POST['delete'];

    // Delete the product from the database
    $delete_query = "DELETE FROM products WHERE id = $product_id";
    mysqli_query($con, $delete_query);
}

// Check if the form is submitted for updating a product
if (isset($_POST['update'])) {
    // Get the product ID and new values
    $product_id = $_POST['update_id'];
    $new_product_name = $_POST['new_product_name'];
    $new_price = $_POST['new_price'];
    $new_quantity = $_POST['new_quantity'];

    // Update the product in the database
    $update_query = "UPDATE products SET product_name = '$new_product_name', price = '$new_price', quantity = '$new_quantity' WHERE id = $product_id";
    mysqli_query($con, $update_query);
}

// Fetch products from the database
$result = mysqli_query($con, "SELECT * FROM products");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .table {
            background-color: #fff;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Product List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td>
                            <form method="post" class="d-inline">
                                <button type="submit" name="delete" value="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updateModal<?php echo $row['id']; ?>">Update</button>

                            <!-- Update Modal -->
                            <div class="modal fade" id="updateModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateModalLabel">Update Product</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="post">
                                            <div class="modal-body">
                                                <input type="hidden" name="update_id" value="<?php echo $row['id']; ?>">
                                                <div class="form-group">
                                                    <label for="new_product_name">Product Name</label>
                                                    <input type="text" class="form-control" id="new_product_name" name="new_product_name" value="<?php echo $row['product_name']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="new_price">Price</label>
                                                    <input type="text" class="form-control" id="new_price" name="new_price" value="<?php echo $row['price']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="new_quantity">Quantity</label>
                                                    <input type="text" class="form-control" id="new_quantity" name="new_quantity" value="<?php echo $row['quantity']; ?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" name="update" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
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
            <li><a href="stocks.php">MANAGE STOCKS</a></li>
            <li><a href="add_product2.php">ADD PRODUCT </a></li>
            <li><a href="view_order2.php">VIEW ORDERS</a></li>
            <li><a href="view_product2.php">VIEW PRODUCTS</a></li>
        </ul>
    </div>

    <div id="main">
        <button class="openbtn" onclick="openNav()">☰ VIEW </button>
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
ss

