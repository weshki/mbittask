  function validateEmail() {
	var email = document.subscribeform.email.value;
	var at = email.indexOf("@");
	var dot = email.lastIndexOf(".");
	var co = email.slice(-3);
	if (email==""||email.length==0)      {
		btnOff();
		document.getElementById("error-message").innerHTML = "Email address is required";
        return false;
      }
    if (at<1||dot<at+2||dot+2>=email.length)      {
		btnOff();
		document.getElementById("error-message").innerHTML = "Please provide a valid e-mail address";
        return false;
      }
	if(co == '.co' ) 	{
		btnOff();
		document.getElementById("error-message").innerHTML = "We are not accepting subscriptions from Colombia emails";
	    return false;
	}	else   {
 		btnOn();
     }
  }

function validateChk() {  
    var ch=document.subscribeform.agree.checked;
	if (ch==false)	     {
		btnOff();
		document.getElementById("error-message").innerHTML = "You must accept the terms and conditions";
        return false;
      } else  {
  		btnOn();
		return true;
		}
	  }	

function btnOn() {
  		document.getElementById("error-message").innerHTML = "";
		document.getElementById("email-btn").removeAttribute('disabled');
     }	

function btnOff() {
		document.getElementById("email-btn").disabled = true;
}

