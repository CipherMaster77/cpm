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
    background-image: url(a.jpg);
    background-size: cover
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
            <li><a href="view.php">MY ORDER</a></li>
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


