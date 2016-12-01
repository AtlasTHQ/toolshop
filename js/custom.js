$( document ).ready(function() {
	console.log("ready");
	$('#registerUserButton').button("disable");​​​​​​​​​​​​​

	$('#reg_passwordConfirm').bind('keyup', function() { 
	var Password = $("#reg_password");
	var confirmPassword = $("#reg_passwordConfirm");

	if ((Password == confirmPassword) && (Password > 1) && (confirmPassword == 1))
	{
	   $('#registerUserButton').button("enable");​​​​​​​​​​​​​
	}

	} );
});