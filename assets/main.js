// main.js

// If we are on the home page or the root path, add the parallax effect
if (document.body.classList.contains('home') || window.location.pathname === '/') {

    // Parallax eventListener
    window.addEventListener('scroll', function () {
        let scrollPosition = window.scrollY;

        // Background
        document.querySelector('.hero-image-background').style.transform =
            `translateY(${scrollPosition * 0.5}px)`;

        // Logo
        document.querySelector('.custom-logo-link').style.transform =
            `translateY(${scrollPosition * 0.4}px)`;


        // Foreground
        document.querySelector('.hero-image-foreground').style.transform =
            `translateY(${scrollPosition * 0.2}px)`;
    });
}


