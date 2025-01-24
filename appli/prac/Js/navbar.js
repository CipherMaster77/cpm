window.addEventListener('scroll', () => {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });

  document.querySelector('.mobile-menu-btn').addEventListener('click', function () {
    document.querySelector('.nav-links').classList.toggle('active');
});
