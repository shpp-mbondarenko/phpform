
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
//fast search employee
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
//searsh companies 
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
//add data about employee
function addEmployeeToDB() {
    var name = $("#name").val();
    var surname = $("#surname").val();
    var birthday = $("#birthday").val();
    var email = $("#email").val();
    var telephone = $("#telephone").val();
    var address = $("#address").val();
    var comp = $("#comp").val();
    var role = $("#role").val();
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
    url: "addemployee.php",
    data: dataString,
    cache: false,
    success: function(result){
        alert(result);
    }
    });
   
    return false;
}
//add data about company
function addCompanyToDB() {
    var companyName = $("#companyName").val();
    var nipt = $("#nipt").val();
    var companyAddress = $("#companyAddress").val();

    var dataString = 
    'companyName='+ companyName + 
    '&nipt='+ nipt + 
    '&companyAddress='+ companyAddress;
    if(companyName == '' || nipt == '' || companyAddress == '') {
        alert("Please Fill All Fields");
    } else {
    // AJAX Code To Submit Form.
        $.ajax({
        type: "POST",
        url: "addcompany.php",
        data: dataString,
        cache: false,
        success: function(result){
            alert(result);
        }
        });
    }   
    return false;
}
//add data to periods of work
function addPeriodsToDB() {
    var setName = $("#setName").val();
    var comp2 = $("#comp2").val();
    var startDate = $("#startDate").val();
    var endDate = $("#endDate").val();
    
    var dataString = 
    'employee='+ setName + 
    '&companyNamePeriods='+ comp2 + 
    '&startDate='+ startDate +     
    '&endDate='+ endDate;
   
    // AJAX Code To Submit Form.
    $.ajax({
    type: "POST",
    url: "addperiods.php",
    data: dataString,
    cache: false,
    success: function(result){
        alert(result);
    }
    });
   
    return false;
}