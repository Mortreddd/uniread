import "./bootstrap";
import "flowbite";
import { Tabs } from "flowbite";
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
});
