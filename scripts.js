
function showAddCompany(id) {
	var obj = document.getElementById(id);
	if(obj.style.visibility == "visible") {
		obj.style.visibility = "hidden"
	} else {
		obj.style.visibility = "visible";
	}
    if (id == "div3") {
        obj = document.getElementById('div1').style.visibility = "hidden";
        document.getElementById('div2').style.visibility = "hidden";
    }
    if (id == "div1") {
        obj = document.getElementById('div3').style.visibility = "hidden";
        document.getElementById('div2').style.visibility = "hidden";
    }    
   
}

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
}

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
}

function setCompany(str){
	document.getElementById("comp").value = str;
	document.getElementById("comp2").value = str;
    document.getElementById("txtHint").innerHTML = "";
    document.getElementById("txtHint2").innerHTML = "";	
}

function setName(str){
	document.getElementById("setName").value = str;
    document.getElementById("nameHint").innerHTML = "";
}

function addEmployeeToDB() {

    alert($("#name").val());

    var name = $("#name").val();
    var surname = $("#surname").val();
    var birthday = $("#birthday").val();
    var email = $("#email").val();
    var telephone = $("#telephone").val();
    var address = $("#address").val();
    var comp = $("#comp").val();
    var role = $("#role").val();
    // Returns successful data submission message when the entered information is stored in database.
    var dataString = 
    'name='+ name + 
    '&surname='+ surname + 
    '&birthday='+ birthday + 
    '&email='+ email + 
    '&telephone='+ telephone + 
    '&address='+ address + 
    '&currentCompany='+ comp + 
    '&role='+ role;
   
    // AJAX Code To Submit Form.
    $.ajax({
    type: "POST",
    url: "addemployee2.php",
    data: dataString,
    cache: false,
    success: function(result){
        alert(result);
    }
    });
   
    return false;

    // xmlhttp = new XMLHttpRequest();        
    // xmlhttp.onreadystatechange = function() {                  
    //     if (this.readyState == 4 && this.status == 200) {
    //         document.getElementById("nameHint").innerHTML = this.responseText;
    //     }                                           
    // };
    // xmlhttp.open("GET","livesearchemployee.php?q="+str,true);
    // xmlhttp.send();
   
}