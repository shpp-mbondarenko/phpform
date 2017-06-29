
function showAddCompany(id) {
	var obj = document.getElementById(id);
	if(obj.style.visibility == "visible") {
		obj.style.visibility = "hidden"
	} else {
		obj.style.visibility = "visible";
	}
},

function showResultName(str) {
    if (str == "") {
        document.getElementById("nameHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {			       
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("nameHint").innerHTML = this.responseText;
            } 		        				        	
        };
        xmlhttp.open("GET","livesearchemployee.php?q="+str,true);
        xmlhttp.send();
    }
},

function showResult(str,b) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        document.getElementById("txtHint2").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
        	if(b){
	            if (this.readyState == 4 && this.status == 200) {
	                document.getElementById("txtHint").innerHTML = this.responseText;
	            }
        	} else {
        		if (this.readyState == 4 && this.status == 200) {
	                document.getElementById("txtHint2").innerHTML = this.responseText;
	            }
        	}
        };
        xmlhttp.open("GET","livesearch.php?q="+str,true);
        xmlhttp.send();
    }
},

function setCompany(str){
	document.getElementById("comp").value = str;
	document.getElementById("comp2").value = str;	
},

function setName(str){
	document.getElementById("setName").value = str;
}