document.addEventListener("DOMContentLoaded", function () {
    const talk = document.querySelector("#talk");
    const content = document.querySelector("#content").textContent;
    responsiveVoice.enableWindowClickHook();
    talk.addEventListener("click", () => {
        if (responsiveVoice.isPlaying()) {
            responsiveVoice.cancel();
        } else {
            responsiveVoice.speak(content);
        }
    });
});
