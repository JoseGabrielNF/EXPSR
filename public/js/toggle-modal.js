function toggleModal() {
    var background = document.getElementById("modal-background");

    if (getComputedStyle(background).display == "none") {
        background.style.display = "flex";
    } else {
        background.style.display = "none";
    }
}