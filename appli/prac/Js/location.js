document.addEventListener("DOMContentLoaded", () => {
    // Initialize Leaflet Map
    const map = L.map("map").setView([10.796685, 122.974098], 17);
  
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    }).addTo(map);
  
    L.marker([10.796685, 122.974098])
      .addTo(map)
      .bindPopup(
        "Sen. Jose C. Locsin Cultural and Civic Center<br>" +
        "Don Generoso (Oso) Gamboa Street<br>" +
        "Silay City Heritage Zone<br>" +
        "Silay City, 6116 Negros Occidental"
      )
      .openPopup();
  
    // Handle Form Submission
    const contactForm = document.getElementById("contactForm");
    contactForm.addEventListener("submit", (event) => {
      event.preventDefault();
  
      const formData = new FormData(contactForm);
  
      fetch("Location.php", {
        method: "POST",
        body: formData,
      })
        .then((response) => response.text())
        .then((data) => {
          alert("Message sent successfully!");
          contactForm.reset();
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    });
  });
  