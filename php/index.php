<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Login</title>
    <style>
      body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-image: url('H.avif'); /* Add your background image path */
    background-size: cover; /* Cover the entire viewport */
    background-position: center; /* Center the background image */
    background-repeat: no-repeat; /* Do not repeat the background image */
}

.container {
    max-width: 400px; /* Adjust the container width as needed */
    margin: 0 auto;
    background-color: rgba(255, 255, 255, 0.5); /* Transparent white background */
    padding: 20px;
    border-radius: 10px; /* Add some border radius for style */
    box-shadow: 0 0 10px rgba(40, 40, 40, 0.2); /* Add a shadow effect */
}

.box.form-box {
    background-color: transparent; /* Transparent background for the form box */
}

.box.form-box header {
    text-align: center;
    margin-bottom: 20px;
}

.field input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.field label {
    display: block;
    margin-bottom: 5px;
}

.field .btn {
    width: 100%;
    padding: 10px;
    background-color: #007bff; /* Blue button color */
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.field .btn:hover {
    background-color: #0056b3; /* Darker blue color on hover */
}

.links {
    text-align: center;
    margin-top: 10px;
}

.links a {
    color: #007bff; /* Blue link color */
    text-decoration: none;
}

.links a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="box form-box">
        <?php
session_start(); // Initialize session

include("php/config.php");

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email'") or die("Select Error");
    $row = mysqli_fetch_assoc($result);

    if (is_array($row) && !empty($row)) {
        if (password_verify($password, $row['Password'])) {
            $_SESSION['valid'] = $row['Email'];
            $_SESSION['username'] = $row['Username'];
            $_SESSION['age'] = $row['Age'];
            $_SESSION['id'] = $row['Id'];
            header("Location: jklastop12sfkfio.php"); // Redirect to verification.php
            exit(); // Add this to stop further execution
        } else {
            echo "<div class='message'>
                <p>Wrong Password</p>
                </div> <br>";
            echo "<a href='index.php'><button class='btn'>Go Back</button>";
        }
    } else {
        echo "<div class='message'>
        <p>User not found</p>
        </div> <br>";
        echo "<a href='index.php'><button class='btn'>Go Back</button>";
    }  
}
?>

            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>

                <div class="links">
                    Don't have an account? <a href="register.php">Sign Up Now</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
