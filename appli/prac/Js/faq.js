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
  