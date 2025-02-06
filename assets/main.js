// main.js


// Parallax eventListener
window.addEventListener('scroll', function () {
    let scrollPosition = window.scrollY;

    // Förflytta bakgrunden
    document.querySelector('.hero-image-background').style.transform =
        `translateY(${scrollPosition * 0.5}px)`;  // Ändra multiplikatorn för att justera hastigheten

    // förflytta loggan
    document.querySelector('.custom-logo-link').style.transform =
        `translateY(${scrollPosition * 0.4}px)`;


    // Förflytta förgrunden
    document.querySelector('.hero-image-foreground').style.transform =
        `translateY(${scrollPosition * 0.2}px)`;  // Snabbare rörelse för förgrunden
});


