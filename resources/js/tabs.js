// create an array of objects with the id, trigger element (eg. button), and the content element
// document.addEventListener("DOMContentLoaded", () => {
//     const tabs = document.querySelectorAll(".tab");
//     const active =
//         "border-b-4 border-solid hover:text-fuchsia-900 text-fuchsia-800 border-fuchsia-800 hover:border-fuchsia-900";
//     const inactive =
//         "text-gray-500 border-b-4 border-gray-100 border-solid hover:text-gray-600 hover:border-gray-300";
//     tabs.forEach((tab) => {
//         tab.addEventListener("click", () => {
//             tabs.forEach((tab) => {
//                 this.classList.remove(active);
//             });
//             this.classList.add(active);
//         });
//     });
// });

document.addEventListener("DOMContentLoaded", function () {
    const tabButtons = document.querySelectorAll(".tab-button");
    const tabContents = document.querySelectorAll(".tab-content");
    tabButtons.forEach((button) => {
        button.addEventListener("click", function () {
            // Remove active class from all buttons
            tabButtons.forEach((btn) => {
                btn.classList.remove("active");
            });

            // Hide all tab content
            tabContents.forEach((content) => {
                content.classList.add("hidden");
            });

            // Add active class to the clicked button
            this.classList.add("active");

            // Show the corresponding tab content
            const tabId = this.getAttribute("data-tab");
            const tabContent = document.querySelector(tabId);
            tabContent.classList.remove("hidden");
        });
    });
});
