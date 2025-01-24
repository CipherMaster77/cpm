<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hero Section with Slideshow</title>
    <style>
        .hero {
            position: relative;
            height: 100vh;
            width: 100%;
            overflow: hidden;
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
        .hero-content {
            position: relative;
            z-index: 10;
            color: white;
            text-align: center;
            padding-top: 20%;
        }
        .button {
            display: inline-flex;
            align-items: center;
            background-color: #7808d0;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 5px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        .button__icon-wrapper {
            position: relative;
            margin-right: 10px;
        }
        .button__icon-svg {
            width: 20px;
            height: 20px;
        }
    </style>
</head>
<body>
    <section class="hero">
        <div class="hero-background">
            <img src="https://images.unsplash.com/photo-1579546929518-9e396f3cc809" alt="Background 1">
            <img src="https://images.unsplash.com/photo-1531297484001-80022131f5a" alt="Background 2">
            <img src="https://images.unsplash.com/photo-1507643179773-3e975154bd78" alt="Background 3">
            <img src="https://images.unsplash.com/photo-1519681393784-d120267933ba" alt="Background 4">
            <img src="https://images.unsplash.com/photo-1481349518771-20055b2a7b24" alt="Background 5">
        </div>
        <div class="hero-content">
            <h1>Welcome to Our Website</h1>
            <p class="txt">Discover more</p>
            <button class="button">
                <span class="button__icon-wrapper">
                    <svg width="10" class="button__icon-svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 15">
                        <path fill="currentColor" d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z"></path>
                    </svg>
                    <svg class="button__icon-svg button__icon-svg--copy" xmlns="http://www.w3.org/2000/svg" width="10" fill="none" viewBox="0 0 14 15">
                        <path fill="currentColor" d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z"></path>
                    </svg>
                </span>
                Explore Now!!
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
</body>
</html>