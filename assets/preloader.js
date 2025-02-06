// window.addEventListener('load', function () {
//     const preloader = document.querySelector('.preloader');
//     const preloaderContent = document.querySelector('.preloader-content');

//     // Första fördröjning innan loggan försvinner
//     setTimeout(function () {
//         preloaderContent.classList.add('fade-out'); // Fader ut loggan

//         // Andra fördröjning innan hela preloadern försvinner
//         setTimeout(function () {
//             preloader.style.opacity = '0';  // Långsam fade-out för preloadern
//             setTimeout(function () {
//                 preloader.style.display = 'none'; // Döljer hela preloadern när animationen är klar
//             }, 500);  // Väntar på att fade-out-animationen för preloadern ska vara klar
//         }, 500); // Väntar 0.5 sek innan preloadern fades ut efter loggan
//     }, 2000); // Väntar 2 sek innan loggan börjar fadeas ut
// });
