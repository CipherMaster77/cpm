<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location and Contact</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        .location-contact-section {
            background-color: #eaeff2;
            padding: 80px 0;
        }

        .location-contact-wrapper {
            display: flex;
            max-width: 1200px;
            margin: 0 auto;
            gap: 40px;
            align-items: center;
        }

        .location-section,
        .contact-section {
            flex: 1;
            background-color: #eaeff2;
            border-radius: 50px;
            padding: 4px;
            transition: transform 0.3s ease;
        }

        .location-section:hover,
        .contact-section:hover {
            transform: translateY(-10px);
        }

        .map-container {
            border-radius: 16px;
            overflow: hidden;
        }

        #map {
            height: 350px;
            width: 100%;
            border-radius: 16px;
        }

        .section-title {
            color: #333;
            margin-bottom: 30px;
            font-size: 2.25rem;
            text-align: center;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: border-color 0.3s ease;
        }

        .contact-form input:focus,
        .contact-form textarea:focus {
            outline: none;
            border-color: #eaeff2;
        }

        .submit-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .location-contact-wrapper {
                flex-direction: column;
                gap: 20px;
            }
        }
    </style>
</head>
<body>
    <section class="location-contact-section">
        <div class="location-contact-wrapper">
            <div class="contact-section" data-aos="fade-left">
                <h2 class="section-title">Contact Us</h2>
                <form class="contact-form">
                    <input type="text" placeholder="Your Name" required>
                    <input type="email" placeholder="Your Email" required>
                    <input type="tel" placeholder="Your Phone">
                    <textarea placeholder="Your Message" rows="5" required></textarea>
                    <button type="submit" class="submit-btn w-100">Send Message</button>
                </form>
            </div>

            <div class="location-section" data-aos="fade-right">
                <h2 class="section-title">Our Location</h2>
                <div class="map-container">
                    <div id="map"></div>
                </div>
                <p class="text-center mt-3">Sen. Jose C. Locsin Cultural and Civic Center, Silay City</p>
            </div>
        </div>
    </section>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const map = L.map('map').setView([10.796685, 122.974098], 17);
            
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            
            L.marker([10.796685, 122.974098]).addTo(map)
                .bindPopup('Sen. Jose C. Locsin Cultural and Civic Center<br>' +
                           'Don Generoso (Oso) Gamboa Street<br>' +
                           'Silay City Heritage Zone<br>' +
                           'Silay City, 6116 Negros Occidental')
                .openPopup();
        });
    </script>
</body>
</html>