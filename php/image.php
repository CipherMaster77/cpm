<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Picture Gallery with Music</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f0f0f0;  
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
            background: linear-gradient(to right, #f0f2f5, #e0e5ec); 
            background-image: url(https://i0.wp.com/acegif.com/wp-content/uploads/gif-heart-30.gif);
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .image {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            animation: fadeIn 1s ease-in-out;
            animation-fill-mode: forwards;
            opacity: 0;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .image:hover {
            transform: scale(1.05);
        }

        /* Delay each image animation */
        .image:nth-child(1) {
            animation-delay: 0.15s;
        }
        .image:nth-child(2) {
            animation-delay: 0.25s;
        }
        .image:nth-child(3) {
            animation-delay: 0.35s;
        }

        .image:nth-child(4) {
            animation-delay: 0.45s;
        }

        .image:nth-child(5) {
            animation-delay: 0.50s;
        }

        .image:nth-child(6) {
            animation-delay: 0.60s;
        }

        .image:nth-child(7) {
            animation-delay: 0.75s;
        }
        .image:nth-child(8) {
            animation-delay: 0.90s;
        }
        .image:nth-child(9) {
            animation-delay: 0.110s;
        }
        .image:nth-child(10) {
            animation-delay: 0.120s;
        }
        .image:nth-child(11) {
            animation-delay: 0.140s;
        }
        .image:nth-child(12) {
            animation-delay: 0.150s;
        }

        /* Add more nth-child selectors as needed */
    </style>
</head>
<body>


    <div class="gallery">
        <img class="image" src="https://memesbams.com/wp-content/uploads/2020/09/you-are-beautiful-quotes-2.jpg" alt="Beautiful picture">
    </div>
    </body>
</html>