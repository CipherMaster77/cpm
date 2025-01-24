
   // Toggle chatbot visibility
   function toggleChatbot() {
    const chatbot = document.getElementById('chatbot');
    chatbot.classList.toggle('active');
}

// Send message and get chatbot response
function sendMessage() {
    const userInput = document.getElementById('chatInput').value.trim();
    const chatbotMessages = document.getElementById('chatbotMessages');
    
    if (userInput !== '') {
        const userMessage = document.createElement('div');
        userMessage.classList.add('message', 'user-message');
        userMessage.textContent = userInput;
        chatbotMessages.appendChild(userMessage);
        
        // Chatbot responses
        setTimeout(() => {
            const botMessage = document.createElement('div');
            botMessage.classList.add('message', 'bot-message');
            
            // Here, you can add more responses based on user input
            if (userInput.toLowerCase().includes("hello") || userInput.toLowerCase().includes("hi")) {
                botMessage.textContent = "Maano kanaman";
            } else if (userInput.toLowerCase().includes("services")) {
                botMessage.textContent = "We offer Luya  pito pito kag puto suman latik ";
            } else {
                botMessage.textContent = "I'm sorry, I didn't quite understand that. Can you please rephrase?";
            }

            chatbotMessages.appendChild(botMessage);
            chatbotMessages.scrollTop = chatbotMessages.scrollHeight; // Auto scroll to bottom
        }, 1000); // Simulate bot response delay
        
        document.getElementById('chatInput').value = ''; // Clear input field
    }
}
