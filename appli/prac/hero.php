<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Design/Hero.css">
</head>
<body>
    <style>
/* Hero Section */
.hero {
    display: flex;
    align-items: center;
    min-height: 100vh;
    background-color: #eaeff2;
    background-image: url('images/logo.png'); /* Add your image URL here */
    background-size: cover; /* Ensures the image covers the entire section */
    background-position: center; /* Centers the image */
    background-repeat: no-repeat; /* Prevents the image from repeating */
    padding: 80px;
    margin-top: 40px;
    position: relative;
    overflow: hidden;
}
    
    /* Optional decorative background elements */
    .hero::before {
    content: '';
    position: absolute;
    width: 500px;
    height: 500px;
    border-radius: 50%;
    background: linear-gradient(45deg, rgba(59, 130, 246, 0.05), rgba(99, 102, 241, 0.05));
    top: -250px;
    right: -250px;
    z-index: 0;
    }
    
    /* Hero content */
    .hero-content {
    max-width: 50%;
    padding-right: 4rem;
    position: relative;
    z-index: 2;
    }
    
    /* Hero Title */
.hero h1 {
    display: inline-block; /* Change display to inline-block for inline positioning */
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
    color: var(--text-color);
    line-height: 1.2;
    letter-spacing: -0.02em;
    background: white;
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    transform: translateX(-100%); /* Start off-screen */
    animation: slideInH1 1s ease-out forwards; /* Slide-in animation for h1 */
    
}

/* Keyframe for h1 slide-in animation */
@keyframes slideInH1 {
    0% {
        transform: translateX(-100%); /* Start off-screen */
    }
    100% {
        transform: translateX(0); /* End at the normal position */
    }
}

    
   
    
    /* From Uiverse.io by FlexionJenish */ 
    .button {
    line-height: 1;
    text-decoration: none;
    display: inline-flex;
    border: none;
    cursor: pointer;
    align-items: center;
    gap: 1.75rem;
    background-color: #00004d;
    color: #fff;
    border-radius: 50px;
    font-weight: 600;
    padding: 0.75rem 1.5rem;
    padding-left: 30px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    transition: background-color 0.3s;
    }
    
    .button__icon-wrapper {
    flex-shrink: 0;
    width: 25px;
    height: 25px;
    position: relative;
    color: #00004d;
    background-color: #fff;
    border-radius: 50%;
    display: grid;
    place-items: center;
    overflow: hidden;
    }
    
    .button:hover {
    background-color: #000;
    }
    
    .button:hover .button__icon-wrapper {
    color: #00004d;
    }
    
    .button__icon-svg--copy {
    position: absolute;
    transform: translate(-150%, -100%); /* Initial position at top-left */
    }
    
    .button:hover .button__icon-svg:first-child {
    transition: transform 0.3s ease-in-out;
    transform: translate(150%, 100%); /* Move to bottom-right on hover */
    }
    
    .button:hover .button__icon-svg--copy {
    transition: transform 0.3s ease-in-out 0.1s;
    transform: translate(0); /* Move to center */
    }

    .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            transition: opacity 1s ease-in-out;
        }
        .hero-background img {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }
        .hero-background img.active {
            opacity: 1;
        }
    </style>

<body>
    <section class="hero">
        <div class="hero-background">
            <img src="images/1.webp" alt="Background 1">
            <img src="images/2.webp" alt="Background 2">
            <img src="images/3.webp" alt="Background 3">
            <img src="images/logo.png" alt="Background 4">
            <img src="images/5.jpg" alt="Background 5">
        </div>
        <div class="hero-content">
            <h1>Credible Solutions/Timely Result</h1>   
            <button class="button">
                <span class="button__icon-wrapper">
                    <svg width="10" class="button__icon-svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 15">
                        <path fill="currentColor" d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z"></path>
                    </svg>
                    <svg class="button__icon-svg button__icon-svg--copy" xmlns="http://www.w3.org/2000/svg" width="10" fill="none" viewBox="0 0 14 15">
                        <path fill="currentColor" d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z"></path>
                    </svg>
                </span>
                Explore Now !!
            </button>
        </div>
    </section>
    <script>
     const images = document.querySelectorAll('.hero-background img');
        let currentImageIndex = 0;

        function changeBackgroundImage() {
            // Remove active class from current image
            images[currentImageIndex].classList.remove('active');
            
            // Move to next image
            currentImageIndex = (currentImageIndex + 1) % images.length;
            
            // Add active class to next image
            images[currentImageIndex].classList.add('active');
        }

        // Initial setup
        images[0].classList.add('active');

        // Change image every 5 seconds
        setInterval(changeBackgroundImage, 5000);
    </script>
<script src="js/chatbot.js"></script>
<script src="js/images.js"></script>
</body>
</html>