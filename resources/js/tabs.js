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
