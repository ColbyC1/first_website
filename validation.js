const validation = new window.JustValidate('#signup');

validation

	.addField("#first", [{
		rule: "required"
	}])

	.addField("#last", [{
		rule: "required"
	}])

	.addField("#age", [{
		rule: "required"
	}])

	.addField("#email", [{
		rule: "required"
	},
	{
		rule: "email"
	},
	{
		validator: (value) => () => {
			return fetch("validate_email.php?email=" + encodeURIComponent(value))

			.then(function(response) {
				return response.json();
			})

			.then(function(json) {
				return json.available;
			});
		},
		
		errorMessage: "Email already taken"
	}])

	.addField("#password", [{
		rule: "required"
	},
	{
		rule: "password"
	}])

	.addField("#password_confirm", [{
		validator: (value, fields) => {
			return value === fields["#password"].elem.value;
		},

		errorMessage: "Passwords should match"
	}])

.onSuccess((event) => {
	document.getElementById("signup").submit();
});