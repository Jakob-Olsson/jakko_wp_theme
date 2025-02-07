// This is the code for the coordinates animation.
document.addEventListener("DOMContentLoaded", function () {
    const container = document.querySelector(".coordinates-container");
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
    if (typeof gsap === "undefined") {
        console.error("GSAP is not loaded.");
        return;
    } else {
        console.log("GSAP is loaded.");
    }
    if (typeof CustomEase === "undefined") {
        console.error("CustomEase is not loaded.");
        return;
    } else {
        console.log("CustomEase is loaded.");
        console.log(CustomEase);

    }

    gsap.registerPlugin(CustomEase);

    CustomEase.create("hop", "M0,0 C0.354,0 0.464,0.133 0.498,0.502 0.532,0.872 0.651 1 1 1");
    console.log("3");


    const menuToggle = document.querySelector(".hamburger")
    const menu = document.querySelector(".menu-screen-main-container")
    const bars = menuToggle.querySelectorAll("div"); // Hittar de tre linjerna
    let isAnimating = false

    console.log("🔹 Initial classes on .hamburger:", menuToggle.classList);

    menuToggle.addEventListener("click", () => {
        console.log("🖱️ Clicked on .hamburger");

        if (isAnimating) {
            console.log("⚠️ isAnimating is true, preventing further clicks.");
            return;
        }



        if (menuToggle.classList.contains("closed")) {
            console.log("✅ Menu is closed, opening now...");

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

                    isAnimating = false;
                }
            })
        }

    })
})