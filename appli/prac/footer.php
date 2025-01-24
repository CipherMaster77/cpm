<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Design/Footer.css">
</head>
<body>
<footer>
    <!-- Chatbot HTML -->
    <div class="chatbot" id="chatbot">
    <div class="chatbot-header">Chat with us!</div>
    <div class="chatbot-messages" id="chatbotMessages">
        <div class="message bot-message">Hello! How can I assist you today?</div>
    </div>
    <div class="chatbot-input">
        <input type="text" id="chatInput" placeholder="Type a message..." />
        <button onclick="sendMessage()">Send</button>
    </div>
</div>

<div class="chatbot-toggle" onclick="toggleChatbot()">💬</div>
    <div class="footer-content">
        <div class="footer-section">
            <h3>About Us</h3>
            <p>We are dedicated to providing the best services to our clients with innovative solutions and cutting-edge technology.</p>
        </div>
        <div class="footer-section">
            <h3>Quick Links</h3>
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#services">Services</a>
            <a href="#contact">Contact</a>
        </div>
        <div class="footer-section">
            <h3>Contact Info</h3>
            <p>Email: info@yourcompany.com</p>
            <p>Phone: (123) 456-7890</p>
            <p>Address: 123 Business Street, City, Country</p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 Your Company Name. All rights reserved.</p>
    </div>
    <script src="js/chatbot.js"></script>
</footer>
</body>
</html>