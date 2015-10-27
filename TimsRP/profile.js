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
	
	alert("Your profile has been updated!");
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

function confirmPassword(){
	var pass = document.forms["PassForm"]["newPass"].value;
	var confPass = document.forms["PassForm"]["confirmPass"].value;
	
	if(pass != confPass){
		alert("New password does not match!");
	}
}

//ValidateFileUpload taken from the author newbieinjavaversion2 from the following URL:
//http://stackoverflow.com/questions/21396279/display-image-and-validation-of-image-extension-before-uploading-file-using-java
function ValidateFileUpload() {
	var fuData = document.getElementById('fileChooser');
    var FileUploadPath = fuData.value;

	//To check if user upload any file
    if (FileUploadPath == '') {
        alert("Please upload an image");

        } else {
        var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

	//The file uploaded is an image

	if (Extension == "gif" || Extension == "png" || Extension == "bmp" || Extension == "jpeg" || Extension == "jpg") {
		// To Display
		if (fuData.files && fuData.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {$('#avatar').attr('src', e.target.result);}
			reader.readAsDataURL(fuData.files[0]);
			}
    } 

	//The file upload is NOT an image
	else {
			alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");

		}
	}
}
