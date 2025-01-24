<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FAQ Section</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #eaeff2;
      box-sizing: border-box;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center; /* Center-aligns items */
      align-items: flex-start;
      max-width: 1200px;
      margin: 50px auto;
      padding: 20px;
      gap: 20px;
    }

    .faq-container {
      flex: 1 1 600px; /* Adjusts size dynamically, minimum of 600px width */
      padding: 20px;
      background: #ffffff;
      border-radius: 20px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }

    .faq-item {
      border-bottom: 1px solid #ddd;
      padding: 15px 0;
    }

    .faq-question {
      display: flex;
      justify-content: space-between;
      align-items: center;
      cursor: pointer;
    }

    .faq-question h3 {
      margin: 0;
      font-size: 18px;
      color: #333;
    }

    .faq-question .icon {
      font-size: 18px;
      font-weight: bold;
      color: #007bff;
      transition: transform 0.3s;
    }

    .faq-answer {
      margin-top: 10px;
      padding-left: 10px;
      display: none;
      color: #555;
      font-size: 16px;
      line-height: 1.6;
    }

    .faq-question.active .icon {
      transform: rotate(45deg);
      color: #d9534f;
    }

    .lottie-container {
      flex: 1 1 300px; /* Adjusts size dynamically, minimum of 300px width */
      display: flex;
      justify-content: center;
      align-items: center;
    }

    dotlottie-player {
      max-width: 100%; /* Ensures it scales within its container */
      height: auto;
      min-width: 200px; /* Ensures it doesn't shrink too much */
    }

    @media (max-width: 768px) {
      .container {
        flex-direction: column; /* Stacks items vertically on small screens */
        gap: 30px;
      }

      .faq-container,
      .lottie-container {
        flex: 1 1 100%; /* Both sections take full width on smaller screens */
      }

      dotlottie-player {
        width: 80%; /* Scales down the Lottie animation */
      }
    }
  </style>
  <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
</head>
<body>
  <div class="container">
    <!-- FAQ Section -->
    <div class="faq-container">
      <h2>Frequently Asked Questions</h2>
      <div class="faq">
        <div class="faq-item">
          <div class="faq-question" onclick="toggleFAQ(this)">
            <h3>What is the purpose of this website?</h3>
            <span class="icon">+</span>
          </div>
          <div class="faq-answer">
            <p>This website is designed to provide information about our services and allow users to contact us easily.</p>
          </div>
        </div>
        <div class="faq-item">
          <div class="faq-question" onclick="toggleFAQ(this)">
            <h3>How can I contact customer support?</h3>
            <span class="icon">+</span>
          </div>
          <div class="faq-answer">
            <p>You can contact customer support using the contact form on the Contact Us page or via the email provided on the website.</p>
          </div>
        </div>
        <div class="faq-item">
          <div class="faq-question" onclick="toggleFAQ(this)">
            <h3>Where is your office located?</h3>
            <span class="icon">+</span>
          </div>
          <div class="faq-answer">
            <p>Our office is located in the Silay City Heritage Zone, Negros Occidental. Please refer to the map in the Location section for details.</p>
          </div>
        </div>
        <div class="faq-item">
          <div class="faq-question" onclick="toggleFAQ(this)">
            <h3>What services do you offer?</h3>
            <span class="icon">+</span>
          </div>
          <div class="faq-answer">
            <p>We offer a variety of services including housing information, evaluation, and other community-related assistance.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Lottie Animation Section -->
    <div class="lottie-container">
      <dotlottie-player
        src="https://lottie.host/5eacb144-d727-4957-81a1-76cf239c17c7/aIooLGOS3y.lottie"
        background="transparent"
        speed="1"
        loop
        autoplay
      ></dotlottie-player>
    </div>
  </div>

  <script>
    function toggleFAQ(element) {
      const parent = element.parentElement;
      const answer = parent.querySelector('.faq-answer');
      const icon = element.querySelector('.icon');

      // Toggle visibility of the answer
      if (answer.style.display === 'block') {
        answer.style.display = 'none';
        icon.textContent = '+';
        element.classList.remove('active');
      } else {
        answer.style.display = 'block';
        icon.textContent = '−';
        element.classList.add('active');
      }
    }
  </script>
</body>
</html>
