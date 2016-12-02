$(document).ready(function() {

	var userButton = $("#registerUserButton");
	userButton.prop("disabled", true);

	$("#reg_passwordConfirm").keyup(function() { 
		userButton.empty();
		var Password = $("#reg_password").val();
		var confirmPassword = $("#reg_passwordConfirm").val();
		$

		if ((Password == confirmPassword) && (Password.length > 0) && (confirmPassword.length > 0))
		{
		   userButton.prop("disabled", false);
		   userButton.append("Sign up");
		}
		else
		{
			var errMsg = "Sorry, but the passwords don't match!";
			userButton.append(errMsg);

		}
	} );
});