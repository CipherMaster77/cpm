<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>See a Beautiful Picture</title>
    <style>
       body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f0f0f0;  
            background: linear-gradient(to right, #f0f2f5, #e0e5ec); 
            background-image: url(https://images.freecreatives.com/wp-content/uploads/2016/04/Fantastic-Blurred-Wallpaper-.jpg);
            background-size: cover;
        }

        button {
            background-color: pink;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
        }

        button.clicked {
            background-color: white;
            color: pink; /* Change text color to pink when clicked */
        }

        button:hover {
            background-color: hotpink; /* Pink solid on hover */
            transform: scale(1.05); /* Scale the button slightly on hover */
        }

        @media only screen and (max-width: 600px) {
            button {
                padding: 10px 20px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>  
    <button onclick="openImageGallery()" aria-label="Click this to see a beautiful picture">Click this to see a beautiful girl!!</button>

    <script>
        function openImageGallery() {
            let destinationUrl = "karyl.php"; 
            window.location.href = destinationUrl;
        }
    </script>
</body>
</html>
