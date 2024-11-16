document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        const sessionMessage = document.getElementById("session-message");
        if (sessionMessage) {
            sessionMessage.style.display = "none";
        }
    }, 2000);
});
document.addEventListener("DOMContentLoaded", function () {
    const dropdownButton = document.getElementById("dropdownDefaultButton");
    const dropdownMenu = document.getElementById("dropdown");
    dropdownButton.addEventListener("click", function () {
        dropdownMenu.classList.toggle("hidden");
    });
});
