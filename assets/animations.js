// This is the code for the coordinates animation.
document.addEventListener("DOMContentLoaded", function () {
    const container = document.querySelector(".coordinates-container");

    if (!container) return;
    const icon = container.querySelector("i");

    container.addEventListener("mouseenter", function () {
        icon.classList.add("fa-spin");
    });

    container.addEventListener("mouseleave", function () {
        icon.classList.remove("fa-spin");
    });
});

// This is the code for the menu animation.
document.addEventListener("DOMContentLoaded", () => {
    gsap.registerPlugin(CustomEase);
    CustomEase.create(
        "hop",
        "M0,0 C0.354,0 0.464,0.133 0.498,0.502 0.532,0.872 0.651 1 1 1"
    );


    const menuToggle = document.querySelector(".hamburger")
    const menu = document.querySelector(".menu-screen-main-container")
    const links = document.querySelectorAll(".menu-item")
    let isAnimating = false

    console.log("🔹 Initial classes on .hamburger:", menuToggle.classList);

    menuToggle.addEventListener("click", () => {
        if (isAnimating) return

        if (menuToggle.classList.contains("closed")) {
            menuToggle.classList.remove("closed");
            menuToggle.classList.add("opened");


            isAnimating = true;

            gsap.to(menu, {
                clipPath: "polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)",
                ease: "hop",
                duration: 1.5,
                onStart: () => {
                    menu.style.pointerEvents = "all";
                },
                onComplete: () => {
                    isAnimating = false;
                }
            })

            // Menu links animation
            gsap.to(links, {
                y: 0,
                opacity: 1,
                stagger: 0.1,
                delay: 0.85,
                duration: 1,
                ease: "power3.out"
            })


        } else {
            menuToggle.classList.remove("opened");
            menuToggle.classList.add("closed");

            isAnimating = true;

            gsap.to(menu, {
                clipPath: "polygon(0% 0%, 100% 0%, 100% 0%, 0% 0%)",
                ease: "hop",
                duration: 1.5,
                onComplete: () => {
                    menu.style.pointerEvents = "none";
                    gsap.set(menu, {
                        clipPath: "polygon(0% 100%, 100% 100%, 100% 100%, 0% 100%)"
                    })

                    gsap.set(links, { y: 30, opacity: 0 })

                    isAnimating = false;
                }
            })
        }

    })
})