document.addEventListener("DOMContentLoaded", () => {
    const bookmarksBorder = document.querySelectorAll(".bookmark-border");
    const borderColors = [
        "border-l-4 border-solid border-fuchsia-900 hover:border-fuchsia-950 focus:border-fuchsia-950",
        "border-l-4 border-solid border-cyan-500 hover:border-cyan-600 focus:border-cyan-600",
        "border-l-4 border-solid border-blue-900 hover:border-blue-950 focus:border-blue-950",
        "border-l-4 border-solid border-yellow-500 hover:border-yellow-600 focus:border-yellow-600",
        "border-l-4 border-solid border-green-900 hover:border-green-950 focus:border-green-950",
    ];

    bookmarksBorder.forEach((bookmark) => {
        const randomStyle =
            borderColors[Math.floor(Math.random() * borderColors.length)];
        const individualClasses = randomStyle.split(" ");
        individualClasses.forEach((className) => {
            bookmark.classList.add(className);
        });
    });
});
