<?php
session_start();
include("php/config.php");

if(!isset($_SESSION['valid'])) {
    header("Location: stocks.php");
    exit();
}   

// Define time limit in seconds (e.g., 1 hour)
$timeLimit = 3600; // 1 hour

if(isset($_POST['submit'])) {
    $emailCode = $_POST['email_code'];
    $email = $_SESSION['valid'];

    $igjkdfhg892jfn24 = IGJKDFHG892JFN24; 
    $maxAttempts = MAX_ATTEMPTS;
    $blockedKey = 'blocked_'.$email; 

    // Check if user is blocked due to multiple failed attempts
    if(isset($_SESSION[$blockedKey]) && $_SESSION[$blockedKey]['attempts'] >= $maxAttempts) {
        // Check if the time limit has passed since the last attempt
        $currentTime = time();
        $lastAttemptTime = $_SESSION[$blockedKey]['timestamp'];
        if ($currentTime - $lastAttemptTime < $timeLimit) {
            echo "<h2>You are blocked due to multiple failed attempts. Please contact support.</h2>";
            exit();
        } else {
            // Reset the attempt count and timestamp
            $_SESSION[$blockedKey]['attempts'] = 0;
            $_SESSION[$blockedKey]['timestamp'] = $currentTime;
        }
    }

    if($emailCode === $igjkdfhg892jfn24) { // Use the updated variable name
        header("Location: stocks.php");
        exit();
    } else {
        echo "<h2>Authentication Failed!</h2>";
        echo "<p>The email code you entered is incorrect.</p>";

        // Update attempt count and timestamp
        if(isset($_SESSION[$blockedKey])) {
            $_SESSION[$blockedKey]['attempts']++;
        } else {
            $_SESSION[$blockedKey] = array('attempts' => 1, 'timestamp' => time());
        }

        if($_SESSION[$blockedKey]['attempts'] >= $maxAttempts) {
            echo "<p>You have reached the maximum number of failed attempts. You are now blocked.</p>";
        } else {
            echo "<p>You have ".$_SESSION[$blockedKey]['attempts']." out of ".$maxAttempts." attempts remaining.</p>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home.php</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <style> 
        body {
            background-color: #f0f2f5; 
            font-family: sans-serif;
        }

        .card { 
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); 
        }

        .form-group { 
            margin-bottom: 15px; 
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        /* Optional: Style error messages */
        h2, p {
            color: #dc3545; /* Error red */
        }

        /* Hide the submit button by default */
        .btn-primary { 
            display: none; 
        }

        input[type="text"] {
            width: 20%; /* Adjust this value as needed */
            padding: 10px; /* Adjust padding as needed */
            border-radius: 5px; /* Optional: adjust border radius */
            border: 1px solid #ccc; /* Optional: adjust border color */
        }
    </style>
</head>
<body>
    
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header"><h2></h2></div> <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group mb-3">
                            <label for=></label> <input type="text" id=" name=" class="form-control" required>
                            </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary"></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header"><h2></h2></div> <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group mb-3">
                                <label for="email_code"></label> <input type="text" id="email_code" name="email_code" class="form-control" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary"></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header"><h2></h2></div> <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group mb-3">
                            <label for=></label> <input type="text" id=" name=" class="form-control" required>
                            </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary"></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const emailCodeInput = document.getElementById('email_code');
        const submitButton = document.querySelector('.btn-primary');

        emailCodeInput.addEventListener('input', () => {
            // Example: Check if email code length is 6
            if (emailCodeInput.value.length === 6) { 
                submitButton.style.display = 'block'; 
            } else {
                submitButton.style.display = 'none';
            }
        });
    </script>
</body>
</html>


