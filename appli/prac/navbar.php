<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar with Dropdown</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <style>
    /* Navigation */
    @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Jersey+10&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playwrite+IN:wght@100..400&family=Raleway:ital,wght@0,100..900;1,100..900&family=Ysabeau+SC:wght@1..1000&display=swap');
.navbar {
    position: fixed;
    top: 0;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 5%;
    background: #eaeff2;
    backdrop-filter: blur(12px) saturate(180%);
    -webkit-backdrop-filter: blur(12px) saturate(180%);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
    z-index: 1000;
    transition: all 0.4s ease;
    border-bottom: 1px solid rgba(234, 224, 224, 0.05);
  }
  
  /* Shrinking navbar on scroll */
  .navbar.scrolled {
    padding: 0.7rem 5%;
    background: rgba(255, 255, 255, 0.99);
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.08);
    color: #4d4dff;
  }
  
  /* Navbar links container */
  .nav-links {
    display: flex;
    gap: 2.5rem;
    align-items: center;
  }
  
  /* Links */
  .nav-links a {
    text-decoration: none;
    color: #040a33;
    font-weight: 500;
    font-size: 0.95rem;
    padding: 0.5rem 0;
    position: relative;
    text-transform: capitalize;
    letter-spacing: 0.2px;
    transition: all 0.3s ease;
  }
  
  /* Underline effect */
  .nav-links a::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 2px;
    background: #eaeff2;
    transition: width 0.3s ease;
    border-radius: 1px;
  }
  
  .nav-links a:hover {
    color: #b9dbe1;
    transform: translateY(-1px);
  }
  
  .nav-links a:hover::after {
    width: 100%;
  }
  
  /* Active link style */
  .nav-links a.active {
    color: #040a33;
    font-weight: 600;
  }
  
  .nav-links a.active::after {
    width: 100%;
  }
  
  /* Dropdown styles */
  .dropdown {
    position: relative;
    display: inline-block;
  }
  
  .dropdown-btn {
    background-color: transparent;
    color: #040a33;
    padding: 0.5rem 1.5rem;
    border: none;
    cursor: pointer;
    font-size: 1rem;
    text-transform: capitalize;
    font-weight: 500;
    transition: color 0.3s ease;
  }
  
  .dropdown-btn:hover {
    color: #b9dbe1;
  }
  
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: white;
    min-width: 160px;
    z-index: 1;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 0.375rem;
  }
  
  .dropdown-content a {
    color: #040a33;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    font-size: 0.95rem;
  }
  
  .dropdown-content a:hover {
    background-color: #f1f1f1;
  }
  
  .dropdown:hover .dropdown-content {
    display: block;
  }
  
  /* Responsive design */
  @media (max-width: 768px) {
    .navbar {
        padding: 1rem 4%;
    }
  
    .nav-links {
        gap: 1.5rem;
    }
  
    .nav-links a {
        font-size: 0.9rem;
    }
  }
  
  /* Mobile menu button */
  .mobile-menu-btn {
    display: none;
    padding: 0.5rem;
    border: none;
    background: transparent;
    cursor: pointer;
  }
  
  @media (max-width: 640px) {
    .mobile-menu-btn {
        display: block;
    }
  
    .nav-links {
        position: fixed;
        top: 0;
        right: -100%;
        height: 100vh;
        width: 70%;
        max-width: 300px;
        background: white;
        flex-direction: column;
        padding: 5rem 2rem;
        gap: 2rem;
        box-shadow: -5px 0 30px rgba(0, 0, 0, 0.1);
        transition: right 0.4s ease;
    }
  
    .nav-links.active {
        right: 0;
    }
  }
  
  /* CTA button styling */
  .cta button {
    background-color: var(--primary-color);
    color: white;
    padding: 0.5rem 1.5rem;
    border: none;
    border-radius: 0.375rem;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  
  .cta button:hover {
    background-color: var(--secondary-color);
  }
  
.logo {
    display: flex;
    align-items: center;
    font-family: "Dancing Script", serif;
}
.logo-image {
    width: 60px;
    height: 60px;
    margin-right: 15px;
    border-radius: 10px;
    background: url('images/logo2.png') center/cover no-repeat; /* Replace 'your-image-url.jpg' with the URL of your image */
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    font-weight: bold;
    font-size: 24px;
}
.logo-text {
    display: flex;
    flex-direction: column;
}
.logo-text h1 {
    margin: 0;
    font-size: 24px;
    color: #333;
}
.logo-text p {
    margin: 5px 0 0;
    font-size: 14px;
    color: #666;
}


    </style>
    <nav class="navbar">
    <div class="logo">
    <div class="logo-image"></div>
    <div class="logo-text">
        <h1>THE BENAVENTE GROUP</h1>
        <p>Hawaii Base Real Estate Appraisers & Consultants</p>
    </div>
</div>
        <div class="nav-links">
            <div class="dropdown">
                <button class="dropdown-btn">Home</button>
               <a href="#about">About</a>
                <div class="dropdown-content">
                    <a href="#home">Services</a>
                    <a href="#home">Teams</a>
                </div>
            </div>
            <!-- Contact Dropdown -->
            <a class="cta" href="#contact">
            <button class="btn-53">
                <div class="letters">
                    <span>(</span>
                    <span>8</span>
                    <span>0</span>
                    <span>8</span>
                    <span>)</span>
                    <span>7</span>
                    <span>8</span>
                    <span>4</span>
                    <span>-</span>
                    <span>4</span>
                    <span>3</span>
                    <span>2</span>
                    <span>0</span>
                </div>
            </button>
        </a>
    </div>
        <!-- Mobile Menu Button -->
        <button class="mobile-menu-btn">☰</button>
    </nav>

    <script src="js/navbar.js"></script>
    
    <script>
      const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const navLinks = document.querySelector('.nav-links');

        mobileMenuBtn.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    </script>
</body>
</html>

