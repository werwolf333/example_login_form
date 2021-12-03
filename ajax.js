
$(document).ready(function () {
	$("#btn").click(
		function () {
			if(validForm())
			{
				sendForm('ajax_form', 'action_ajax_form.php');
			}
			return false;
		}
	);
});

function sendForm(ajax_form, url) {
	$.ajax({
		url: url, 
		type: "POST",
		dataType: "html",
		data: $("#" + ajax_form).serialize(),
		success: function (response) {
			errors = $.parseJSON(response);
			if(errors==" ")
			{
				$('#result_form').html('<p class="ColorBlack"> Вы успешно зарегистрировались </p>');
				$("#ajax_form").hide();
			}
		},
		error: function (response) {
			$('#result_form').html('Ошибка. Данные не отправлены.');
		}
	});
}

function validForm() {
	var errorsJs = [];
	var name = document.getElementById("name").value;
	var surname = document.getElementById("surname").value;
	var tel = document.getElementById("tel").value;
	var email = document.getElementById("email").value;
	var password = document.getElementById("password").value;
	var password_repeat = document.getElementById("password_repeat").value;

	if (name == "")
	{
		errorsJs.push(" void_user_name");
	}
	if (surname == "")
	{
		errorsJs.push(" void_user_surname");
	}
	if (tel == "")
	{
		errorsJs.push(" void_user_tel");
	}
	if (email == "")
	{
		errorsJs.push(" void_user_email");
	}
	if (password == "")
	{
		errorsJs.push(" void_user_password");
	}
	if (password_repeat == "")
	{
		errorsJs.push(" void_user_password_repeat");
	}
	if (password!=password_repeat)
	{
		errorsJs.push(" password_and_password_repeat_does_not_match");
	}
	
	var patternEmail = /@/;
	if(!patternEmail.test(email))
	{
		errorsJs.push(" invalid_email");
	}

	var patternTel = /^\+375(25|29|33|44)/;
	if(!patternTel.test(tel))
	{
		errorsJs.push(" invalid_phone_number");
	}

	var successfulValid = false;
	if(errorsJs.length==0)
	{
		successfulValid = true;
	}
	else
	{
		errorsJs[errorsJs.length - 1] = errorsJs[errorsJs.length - 1] + ".";
		$('#result_form').html('<br>' + errorsJs);
		successfulValid = false;
	}
	return successfulValid;
}