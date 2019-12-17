function profile(activity)
{
	if (activity == "saveProfile")
	{
		var name = document.getElementById("userFullname").value;
		var ic= document.getElementById("userIC").value;
		var phone= document.getElementById("userPhoneNo").value;
		var email = document.getElementById("userEmail").value;
		var address = document.getElementById("userAddress").value;
		var pass = document.getElementById("currentPassword").value;
		var pass1 = document.getElementById("userPassword").value;
		var pass2 = document.getElementById("confirmPassword").value;
		
		if (pass1 != pass2)
		{
			alert("Password not matched!");
			return false; 
		}
		
		if (name.length == 0 || ic.length == 0 || phone.length == 0 || email.length == 0 || address.length == 0 || pass.length == 0 )
		document.forms[0].action = '../controller/profile_control.php?activity='+activity;	
		document.forms["editProfileForm"].submit();
	}
}