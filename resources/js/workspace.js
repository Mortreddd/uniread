document.addEventListener("DOMContentLoaded", () => {
    const btnStrong = document.getElementById("btn-strong");
    const btnEm = document.getElementById("btn-em");
    const content = document.getElementById("content");

    btnStrong.addEventListener("click", () => {
        const selectedText = document.getSelection().toString();
        if (selectedText) {
            const strongTag = document.createElement("strong");
            strongTag.textContent = selectedText;

            const range = document.getSelection().getRangeAt(0);
            range.deleteContents();
            range.insertNode(strongTag);
        }
    });

    btnEm.addEventListener("click", () => {
        const selectedText = document.getSelection().toString();
        if (selectedText) {
            const emTag = document.createElement("em");
            emTag.textContent = selectedText;

            const range = document.getSelection().getRangeAt(0);
            range.deleteContents();
            range.insertNode(emTag);
        }
    });
});
