function toggleModal() {

	var visibility = window.getComputedStyle(document.getElementsByClassName('modal-background')[0]).visibility;

	if (visibility == "hidden") {
		document.getElementsByClassName("modal-background")[0].style.visibility = "visible";
	} else {
		document.getElementsByClassName("modal-background")[0].style.visibility = "hidden";
	}
}