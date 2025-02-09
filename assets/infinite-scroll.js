document.addEventListener('DOMContentLoaded', function () {
    let page = 2;
    let loading = false;
    let grid = document.querySelector(".gallery-container");
    let masonry;

    // Funktion för att initiera Masonry
    function initMasonry() {
        if (!grid) return;

        masonry = new Masonry(grid, {
            itemSelector: ".gallery-item",
            columnWidth: ".gallery-item",
            percentPosition: true,
            gutter: 10,
            horizontalOrder: true,
            fitWidth: true,
            transitionDuration: '0.2s',
            stagger: 30
        });

        // Se till att layouten uppdateras efter att bilderna har laddats in
        imagesLoaded(grid, function () {
            masonry.layout();
        });
    }

    // Kör Masonry vid sidladdning
    initMasonry();

    function loadMoreImages() {
        if (loading) return;
        loading = true;

        let data = new FormData();
        data.append('action', 'load_more_gallery_images');
        data.append('page', page);

        fetch(ajax_params.ajaxurl, {
            method: 'POST',
            body: data
        })
            .then(response => response.text())
            .then(html => {
                if (html.trim() !== 'Inga bilder att visa.') {
                    let tempDiv = document.createElement("div");
                    tempDiv.innerHTML = html;
                    let newItems = tempDiv.querySelectorAll(".gallery-item");

                    document.querySelector(".gallery-container").append(...newItems);
                    page++;
                    loading = false;

                    // Se till att bilderna laddas in innan Masonry anpassas
                    imagesLoaded(grid, function () {
                        masonry.appended(newItems);
                        masonry.layout();
                    });

                } else {
                    console.log("Inga fler bilder att ladda.");
                }
            })
            .catch(error => console.error("Error:", error));
    }

    // Lyssna på scroll-händelsen
    window.addEventListener('scroll', function () {
        let scrollPosition = this.window.scrollY + this.window.innerHeight;
        let pageHeight = document.body.scrollHeight;

        if (scrollPosition >= pageHeight - 700) {
            loadMoreImages();
        }
    });
});





















// document.addEventListener('DOMContentLoaded', function () {
//     let page = 2;
//     let loading = false;

//     // Hämta Masonry-instansen globalt
//     let grid = document.querySelector(".gallery-container");
//     let masonry = new Masonry(grid, {
//         itemSelector: ".gallery-item",
//         columnWidth: ".gallery-item",
//         percentPosition: true,
//         gutter: 10,
//         horizontalOrder: true,
//         fitWidth: true,
//         transitionDuration: '0.2s',
//         stagger: 30
//     });

//     function loadMoreImages() {
//         if (loading) return;
//         loading = true;

//         let data = new FormData();
//         data.append('action', 'load_more_gallery_images');
//         data.append('page', page);

//         fetch(ajax_params.ajaxurl, {
//             method: 'POST',
//             body: data
//         })
//             .then(response => response.text())
//             .then(html => {
//                 if (html.trim() !== 'Inga bilder att visa.') {
//                     let tempDiv = document.createElement("div");
//                     tempDiv.innerHTML = html;
//                     let newItems = tempDiv.querySelectorAll(".gallery-item");

//                     document.querySelector(".gallery-container").append(...newItems);
//                     page++;
//                     loading = false;

//                     // Lägg till nya bilder i Masonry och uppdatera layouten
//                     masonry.appended(newItems);
//                     masonry.layout();
//                 } else {
//                     console.log("Inga fler bilder att ladda.");
//                 }
//             })
//             .catch(error => console.error("Error:", error));
//     }

//     // Lyssna på scroll-händelsen
//     window.addEventListener('scroll', function () {
//         let scrollPosition = this.window.scrollY + this.window.innerHeight;
//         let pageHeight = document.body.scrollHeight;

//         if (scrollPosition >= pageHeight - 100) {
//             loadMoreImages();
//         }
//     });
// });


























// document.addEventListener('DOMContentLoaded', function () {
//     let page = 2;
//     let loading = false;

//     function loadMoreImages() {
//         if (loading) return;
//         loading = true;

//         let data = new FormData();
//         data.append('action', 'load_more_gallery_images');
//         data.append('page', page);

//         fetch(ajax_params.ajaxurl, {
//             method: 'POST',
//             body: data
//         })
//             .then(response => response.text())
//             .then(html => {
//                 if (html.trim() !== 'Inga bilder att visa.') {
//                     document.querySelector(".gallery-container").insertAdjacentHTML('beforeend', html);
//                     page++;
//                     loading = false;
//                 } else {
//                     console.log("Inga fler bilder att ladda.");
//                 }
//             })
//             .catch(error => console.error("Error:", error));
//     }

//     // Lyssna på scroll-händelsen
//     window.addEventListener('scroll', function () {
//         let scrollPosition = this.window.scrollY + this.window.innerHeight;
//         let pageHeight = document.body.scrollHeight;

//         if (scrollPosition >= pageHeight - 100) {
//             loadMoreImages();
//         }
//     })
// })