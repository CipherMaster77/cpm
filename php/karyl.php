<!DOCTYPE html>
<html>
<head>
    <title>Application Form</title>
</head>
<body>
    <style>
.container {
    width: 500px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

h1 {
    text-align: center;
    margin-bottom: 30px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"], input[type="email"], input[type="tel"], input[type="file"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 3px;
    box-sizing: border-box;
}
 </style>
    <div class="container">
        <h1>Application Form</h1>
        <form action="submit.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Personal Information</legend>
                <div class="form-group">
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="profile_pic">Profile Picture:</label>
                    <input type="file" id="profile_pic" name="profile_pic" accept="image/*" required>
                </div>
            </fieldset>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $target_dir = "uploads/";
    $file_name = basename($_FILES["profile_pic"]["name"]);
    $target_file = $target_dir . $file_name;

    if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
        echo "Application submitted successfully!";

        // Store other form data in a database or as needed
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        // ... (Process data) 

    } else {
        echo "Error uploading your picture.";
    }
}
?>

