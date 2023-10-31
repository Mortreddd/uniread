import "./bootstrap";
import "flowbite";
document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll(".card");
    const checkBoxes = () => {
        const triggerButtom = (window.innerHeight / 5) * 4;
        cards.forEach((card, index) => {
            const cardTop = card.getBoundingClientRect().top;
            if (cardTop < triggerButtom) {
                setTimeout(() => {
                    card.classList.add("show");
                }, 100);
            } else {
                card.classList.remove("show");
            }
        });
    };

    window.addEventListener("scroll", checkBoxes);
    checkBoxes();

    const listItems = document.querySelectorAll(".items");
    listItems[0].classList.add("border-fuchsia-900");
    listItems.forEach(function (item) {
        item.addEventListener("click", function () {
            listItems.forEach(function (item) {
                item.classList.remove("border-fuchsia-900");
            });
            this.classList.add("border-fuchsia-900");
        });
    });
});
