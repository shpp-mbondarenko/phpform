function showAddCompany(id) {
	var obj = document.getElementById(id);
	if(obj.style.visibility == "visible") {
		obj.style.visibility = "hidden"
	} else {
		obj.style.visibility = "visible";
	}
}