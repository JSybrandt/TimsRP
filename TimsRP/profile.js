function validateGenInfo() {
    var fName = document.forms["GenInfo"]["firstname"].value;
	var lName = document.forms["GenInfo"]["lastname"].value;
	
    if (fName == null || fName == "") {
        alert("First name must be filled out.");
        return false;
    }
	if (lName == null || lName == "") {
        alert("Last name must be filled out.");
        return false;
    }
	
	var email = document.forms["GenInfo"]["email"].value;
	
	if (validateEmail(email)) {
	} else {
		alert("Please enter a valid email");
	}
	
	
	var zip = document.forms["GenInfo"]["zipCode"].value;
	
	if(validateZip(zip)){
	}else {
		alert("Please enter a valid US zip code");
	}
	
	
	//Return
	return false;
}

function validateZip(zip)
{
	var isValidZip = /(^\d{5}$)|(^\d{5}-\d{4}$)/;
	return isValidZip.test(zip);	
}

function validateEmail(email) { 
	//regular expression taken from the authors of the top answer for the URL below
	//http://stackoverflow.com/questions/46155/validate-email-address-in-javascript
  
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
