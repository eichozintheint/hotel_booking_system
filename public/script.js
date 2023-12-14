document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll("nav a");
    navLinks.forEach(link => {
        link.addEventListener("click", function (event) {
            event.preventDefault();

            const targetId = this.getAttribute("href").substring(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                const headerHeight = document.querySelector("header").offsetHeight;
                const targetPosition = targetElement.offsetTop - headerHeight;

                window.scrollTo({
                    top: targetPosition,
                    behavior: "smooth"
                });
            }
        });
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const cuisineSection = document.getElementById("cuisine");
    const leftButton = document.querySelector("#wrapper i:first-child");
    const rightButton = document.querySelector("#wrapper i:last-child");
    const scrollAmount = 2000;
    leftButton.addEventListener("click", function () {
        cuisineSection.scrollBy({
            left: -scrollAmount,
            behavior: "smooth"
        });
    });
    rightButton.addEventListener("click", function () {
        cuisineSection.scrollBy({
            left: scrollAmount,
            behavior: "smooth"
        });
    });
    document.getElementById('next').onclick = function (e) {
        e.preventDefault();
        let lists = document.querySelectorAll('.item');
        document.getElementById('slide').appendChild(lists[0]);
    }
    document.getElementById('prev').onclick = function (e) {
        e.preventDefault();
        let lists = document.querySelectorAll('.item');
        document.getElementById('slide').prepend(lists[lists.length - 1]);
    }
});


// document.addEventListener("DOMContentLoaded", function () {
//     const navLinks = document.querySelectorAll("nav a");
//     navLinks.forEach(link => {
//         link.addEventListener("click", function (event) {
//             event.preventDefault();

//             const targetId = this.getAttribute("href").substring(1);
//             const targetElement = document.getElementById(targetId);

//             if (targetElement) {
//                 const headerHeight = document.querySelector("header").offsetHeight;
//                 const targetPosition = targetElement.offsetTop - headerHeight;

//                 window.scrollTo({
//                     top: targetPosition,
//                     behavior: "smooth"
//                 });
//             }
//         });
//     });
// });
// document.addEventListener("DOMContentLoaded", function () {
//     const cuisineSection = document.getElementById("cuisine");
//     const leftButton = document.querySelector("#wrapper i:first-child");
//     const rightButton = document.querySelector("#wrapper i:last-child");
//     const scrollAmount = 2000;
//     leftButton.addEventListener("click", function () {
//         cuisineSection.scrollBy({
//             left: -scrollAmount,
//             behavior: "smooth"
//         });
//     });
//     rightButton.addEventListener("click", function () {
//         cuisineSection.scrollBy({
//             left: scrollAmount,
//             behavior: "smooth"
//         });
//     });
//     document.getElementById('next').onclick = function (e) {
//         e.preventDefault();
//         let lists = document.querySelectorAll('.item');
//         document.getElementById('slide').appendChild(lists[0]);
//     }
//     document.getElementById('prev').onclick = function (e) {
//         e.preventDefault();
//         let lists = document.querySelectorAll('.item');
//         document.getElementById('slide').prepend(lists[lists.length - 1]);
//     }
// });


