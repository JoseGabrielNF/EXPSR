function toggleSidebar() {

	var visibility = window.getComputedStyle(document.getElementsByClassName('sidebar')[0]).visibility;

	if (visibility == "hidden") {
		document.getElementsByClassName("sidebar")[0].style.visibility = "visible";
		document.getElementsByClassName("dashboard-body")[0].style.marginLeft = "200px";
	} else {
		document.getElementsByClassName("sidebar")[0].style.visibility = "hidden";
		document.getElementsByClassName("dashboard-body")[0].style.marginLeft = "0px";
	}
}