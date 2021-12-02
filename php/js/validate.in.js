$().ready(function () { 

			///*********JQUERY VALIDATION  START PAGE********///
	///registration form
	$("#register-user").click(function (e) {
		$("#register-user").val("please wait...");
		if ($("#user-register")[0].checkValidity()) {
			e.preventDefault();
			$.ajax({
				url: "user-validity.php",
				method: "POST",
				data:$("#user-register").serialize()+"&register=registered",
				success:function (response) {
					if (response !== "registration-success!") {
						$('#msgpop').html(response);
						$('#register-user').val("try again...");
					}
						else{
							$('#msgpop').text("");
							$("#user-register")[0].reset();
							$('#register-user').val("register");
							setTimeout(function () {
								window.location= "./verify.php"
							},500);
						}
				}
			});
		}
	});
	///login form
	$("#login-user").click(function (e) {
		$("#login-user").val("please wait...");
		if ($("#user-login")[0].checkValidity()) {
			e.preventDefault();
			$.ajax({
				url: "user-validity.php",
				method: "POST",
				data:$("#user-login").serialize()+"&action=user_login",
				success:function (response) {
					if (response !== "logged-in!") {
						$('#msgpop').html(response);
						$('#login-user').val("try again...");
					}
						else{
							$('#msgpop').text("");
							$("#user-login")[0].reset();
							$('#login-user').val("logging in...");
							setTimeout(function () {
								window.location= "./verify.php"
							},1000);
						}
				}
			});
		}
	});


});



			///*********JQUERY VALIDATION  START END********///