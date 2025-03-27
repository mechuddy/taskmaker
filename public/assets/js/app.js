/**
 * Group or Collection of Arrow Functions
 * that perform specific or given task.
*/
const navigate = (url) => { location.href = url; }
const scrollUp = () => {
	let time = 1000;
	setTimeout(function() {
		window.scrollTo({
			top: 0,
			behavior: "smooth"
		});
	}, time);
}
const scrollDown = () => {
	let time = 1000;
	setTimeout(function() {
		window.scrollTo({
			top: document.body.scrollHeight,
			behavior: "smooth"
		});
	}, time);
}
const register = () => {
	// form input validators
	const validateName = (a, b) => {
		let validityStatus = empty;
		b.html(empty).hide();
		if(a == empty) {
			b.html("Name cannot be empty").show();
		} else {
			if((a.length < 3) || (a.length > 255)) {
				b.html("Name is too long or short").show();
			} else {
				if(/[^a-zA-Z ]/.test(a)) {
					b.html("Name is not valid").show();
				} else {
					b.html(empty).hide();
					validityStatus = "VALIDATED";
					return validityStatus;
				}
			}
		}
	}
	const validateEmail = (a, b) => {
		let validityStatus = empty;
		b.html(empty).hide();
		if(a == empty) {
			b.html("Email cannot be empty").show();
		} else {
			if((a.length < 11) || (a.length > 255)) {
				b.html("Email is too long or short").show();
			} else {
				if(!((a.indexOf('@') > 0) && (a.indexOf('.') > 0)) || (/[^a-z0-9@.]/.test(a))) {
					b.html("Email is not valid").show();
				} else {
					b.html(empty).hide();
					validityStatus = "VALIDATED";
					return validityStatus;
				}
			}
		}
	}
	const validatePhoneNumber = (a, b) => {
		let validityStatus = empty;
		b.html(empty).hide();
		if(a == empty) {
			b.html("Phone Number cannot be empty").show();
		} else {
			if(/[^0-9]/.test(a)) {
				b.html("Phone Number should be digits").show();
			} else {
				if((a.length < 10) || (a.length > 15)) {
					b.html("Phone Number should be 10-15 digits").show();
				} else {
					b.html(empty).hide();
					validityStatus = "VALIDATED";
					return validityStatus;
				}
			}
		}
	}
	const validatePassword = (a, b) => {
		let validityStatus = empty;
		b.html(empty).hide();
		if(a == empty) {
			b.html("Password cannot be empty").show();
		} else {
			if((a.length < 8) || (a.length > 15)) {
				b.html("Password should be 8-15 characters").show();
			} else {
				b.html(empty).hide();
				validityStatus = "VALIDATED";
				return validityStatus;
			}
		}
	}
	/* VARIABLES */
	let empty = "";
	let alert = empty;
	let time = 4000;
	const token = $("meta[name='csrf-token']").attr('content');
	const firstname = $("#firstname").val();
	const lastname = $("#lastname").val();
	const email = $("#email").val();
	const phonenumber = $("#phonenumber").val();
	let username = empty;
	let usernameInput = $("#username");
	const password = $("#password").val();
	const confirmPassword = $("#confirm-password").val();
	let firstnameError = $(".firstname-error");
	let lastnameError = $(".lastname-error");
	let emailError = $(".email-error");
	let phonenumberError = $(".phonenumber-error");
	let passwordError = $(".password-error");
	let formBtn = $("#user-register-btn");
	let formNotification = $(".form-notification");
	let form = $("#user-register-form");
	const firstnameStatus = validateName(firstname, firstnameError);
	const lastnameStatus = validateName(lastname, lastnameError);
	const emailStatus = validateEmail(email, emailError);
	const phonenumberStatus = validatePhoneNumber(phonenumber, phonenumberError);
	const passwordStatus = validatePassword(password, passwordError);
	// cond
	if((firstnameStatus == "VALIDATED") && (lastnameStatus == "VALIDATED") && (emailStatus == "VALIDATED") && (phonenumberStatus == "VALIDATED") && (passwordStatus == "VALIDATED")) {
		// set username
		username = (firstname + "." + lastname).toLowerCase();
		usernameInput.val(username);
		// check passwords matching
		if(password == confirmPassword) {
			// FORM DATA
			let formData = new FormData();
			// route
			let route = "/user/register";
			// payload
			formData.append("_token", token);
			formData.append("firstname", firstname);
			formData.append("lastname", lastname);
			formData.append("email", email);
			formData.append("phonenumber", phonenumber);
			formData.append("username", username);
			formData.append("password", password);
			// AJAX Call
			$.ajax({
				type: "POST",
				url: route,
				data: formData,
				contentType: false,
				processData: false,
				success: function(response) {
					if(response.success) {
						alert = "<div class='alert alert-success alert-dismissible fade show' role='alert'>Registration Successful</div>";
						formNotification.append(alert);
						scrollUp();
						setTimeout(function() {
							formNotification.html(empty);
							form.trigger("reset");
						}, time);
					}
				}
			});
		} else {
			alert = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Passwords do not match</div>";
			formNotification.append(alert);
			scrollUp();
			setTimeout(function() {
				let time = 3000;
				formNotification.html(empty);
				scrollDown();
			}, time);
		}
	}
}
const login = () => {
	// form input validators
	const validateIdentity = (a, b) => {
		let validityStatus = empty;
		b.html(empty).hide();
		if(a == empty) {
			b.html("Email or Username cannot be empty").show();
		} else {
			b.html(empty).hide();
			validityStatus = "VALIDATED";
			return validityStatus;
		}
	}
	const validatePassword = (a, b) => {
		let validityStatus = empty;
		b.html(empty).hide();
		if(a == empty) {
			b.html("Password cannot be empty").show();
		} else {
			b.html(empty).hide();
			validityStatus = "VALIDATED";
			return validityStatus;
		}
	}
	/* VARIABLES */
	let empty = "";
	let alert = empty;
	let time = 4000;
	const token = $("meta[name='csrf-token']").attr('content');
	const identity = $("#identity").val();
	const password = $("#password").val();
	let identityError = $(".identity-error");
	let passwordError = $(".password-error");
	let formBtn = $("#user-login-btn");
	let formNotification = $(".form-notification");
	let form = $("#user-login-form");
	const identityStatus = validateIdentity(identity, identityError);
	const passwordStatus = validatePassword(password, passwordError);
	if((identityStatus == "VALIDATED") && (passwordStatus == "VALIDATED")) {
		// FORM DATA
		let formData = new FormData();
		// route
		let route = "/user/login";
		// payload
		formData.append("_token", token);
		formData.append("identity", identity);
		formData.append("password", password);
		// AJAX Call
		$.ajax({
			type: "POST",
			url: route,
			data: formData,
			contentType: false,
			processData: false,
			success: function(response) {
				if(response.message == "User Not Found") {
					alert = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>User Not Found</div>";
					formNotification.append(alert);
					setTimeout(function() {
						let time = 3000;
						formNotification.html(empty);
					}, time);
				} else {
					if(response.message == "Password Not Correct") {
						alert = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>Password Not Correct</div>";
						formNotification.append(alert);
						setTimeout(function() {
							let time = 3000;
							formNotification.html(empty);
						}, time);
					} else {
						alert = "<div class='alert alert-success alert-dismissible fade show' role='alert'>Login Successful</div>";
						formNotification.append(alert);
						setTimeout(function() {
							formNotification.html(empty);
							form.trigger("reset");
							navigate(response.redirect);
						}, time);
					}
				}
			}
		});
	}
}
const createTask = () => {
	// form input validators
	const validateTitle = (a, b) => {
		let validityStatus = empty;
		b.html(empty).hide();
		if(a == empty) {
			b.html("Please Add Title").show();
		} else {
			if(/[^a-zA-Z ]/.test(a)) {
				b.html("Title is not valid").show();
			} else {
				b.html(empty).hide();
				validityStatus = "VALIDATED";
				return validityStatus;
			}
		}
	}
	const validateDescription = (a, b) => {
		let validityStatus = empty;
		b.html(empty).hide();
		if(a == empty) {
			b.html("Please Add Description").show();
		} else {
			b.html(empty).hide();
			validityStatus = "VALIDATED";
			return validityStatus;
		}
	}
	const validateDate = (a, b) => {
		let validityStatus = empty;
		b.html(empty).hide();
		if(a == empty) {
			b.html("Please Select Date").show();
		} else {
			b.html(empty).hide();
			validityStatus = "VALIDATED";
			return validityStatus;
		}
	}
	/* VARIABLES */
	let empty = "";
	let alert = empty;
	let time = 4000;
	const token = $("meta[name='csrf-token']").attr('content');
	const title = $("#title").val();
	const description = $("#description").val();
	const date = $("#date").val();
	let titleError = $(".title-error");
	let descriptionError = $(".description-error");
	let dateError = $(".date-error");
	let formBtn = $("#user-new-task-btn");
	let formNotification = $(".form-notification");
	let form = $("#user-new-task-form");
	const titleStatus = validateTitle(title, titleError);
	const descriptionStatus = validateDescription(description, descriptionError);
	const dateStatus = validateDate(date, dateError);
	// cond
	if((titleStatus == "VALIDATED") && (descriptionStatus == "VALIDATED") && (dateStatus == "VALIDATED")) {
		// FORM DATA
		let formData = new FormData();
		// route
		let route = "/user/newtask";
		// payload
		formData.append("_token", token);
		formData.append("title", title);
		formData.append("description", description);
		formData.append("date", date);
		// AJAX Call
		$.ajax({
			type: "POST",
			url: route,
			data: formData,
			contentType: false,
			processData: false,
			success: function(response) {
				if(response.success) {
					alert = "<div class='alert alert-success alert-dismissible fade show' role='alert'>Task Created Successfully</div>";
					formNotification.append(alert);
					scrollUp();
					setTimeout(function() {
						formNotification.html(empty);
						form.trigger("reset");
					}, time);
				}
			}
		});
	}
}
const updateTask = () => {
	// form input validators
	const validateTitle = (a, b) => {
		let validityStatus = empty;
		b.html(empty).hide();
		if(a == empty) {
			b.html("Please Add Title").show();
		} else {
			if(/[^a-zA-Z ]/.test(a)) {
				b.html("Title is not valid").show();
			} else {
				b.html(empty).hide();
				validityStatus = "VALIDATED";
				return validityStatus;
			}
		}
	}
	const validateDescription = (a, b) => {
		let validityStatus = empty;
		b.html(empty).hide();
		if(a == empty) {
			b.html("Please Add Description").show();
		} else {
			b.html(empty).hide();
			validityStatus = "VALIDATED";
			return validityStatus;
		}
	}
	const validateDate = (a, b) => {
		let validityStatus = empty;
		b.html(empty).hide();
		if(a == empty) {
			b.html("Please select Date").show();
		} else {
			b.html(empty).hide();
			validityStatus = "VALIDATED";
			return validityStatus;
		}
	}
	const validateChoice = (a, b) => {
		let validityStatus = empty;
		let none = "None";
		b.html(empty).hide();
		if(a == none) {
			b.html("Please Select Status").show();
		} else {
			b.html(empty).hide();
			validityStatus = "VALIDATED";
			return validityStatus;
		}
	}
	/* VARIABLES */
	let empty = "";
	let alert = empty;
	let time = 4000;
	const url = window.location.href;
	const segments = url.split('/');
	const id = segments[segments.indexOf('user') + 1];
	const token = $("meta[name='csrf-token']").attr('content');
	const title = $("#title").val();
	const description = $("#description").val();
	const date = $("#date").val();
	const status = $("#status").val();
	let titleError = $(".title-error");
	let descriptionError = $(".description-error");
	let dateError = $(".date-error");
	let statusError = $(".status-error");
	let formBtn = $("#user-new-task-btn");
	let formNotification = $(".form-notification");
	let form = $("#user-new-task-form");
	const titleStatus = validateTitle(title, titleError);
	const descriptionStatus = validateDescription(description, descriptionError);
	const dateStatus = validateDate(date, dateError);
	const statusSelectionStatus = validateChoice(status, statusError);
	// cond
	if((titleStatus == "VALIDATED") && (descriptionStatus == "VALIDATED") && (dateStatus == "VALIDATED") && (statusSelectionStatus == "VALIDATED")) {
		// FORM DATA
		let formData = new FormData();
		// route (template literal)
		let route = `/user/${id}/edit`;
		// payload
		formData.append("_token", token);
		formData.append("title", title);
		formData.append("description", description);
		formData.append("date", date);
		formData.append("status", status);
		// AJAX Call
		$.ajax({
			type: "POST",
			url: route,
			data: formData,
			contentType: false,
			processData: false,
			success: function(response) {
				if(response.success) {
					alert = "<div class='alert alert-success alert-dismissible fade show' role='alert'>Task Updated Successfully</div>";
					formNotification.append(alert);
					scrollUp();
					setTimeout(function() {
						formNotification.html(empty);
					}, time);
				}
			}
		});
	}
}
const deleteTask = (id) => {
	const action = "DELETE";
	const token = $("meta[name='csrf-token']").attr('content');
	// ASSUMING FORM DATA
	let formData = new FormData();
	// payload
	formData.append("_token", token);
	formData.append("action", action);
	// route (template literal)
	let route = `/user/${id}/delete`;
	// AJAX Call
	$.ajax({
		type: "POST",
		url: route,
		data: formData,
		contentType: false,
		processData: false,
		success: function(response) {
			if(response.success) {
				navigate(response.redirect);
			}
		}
	});
}
const logout = () => {
	// use fetch
	const token = $("meta[name='csrf-token']").attr('content');
	let route = "/user/logout";
	fetch(route, {
		method: "POST",
		headers: {
			'Content-Type': 'application/json',
			'X-CSRF-TOKEN': token
		}
	}).then(response => response.json()).then(data => {
		if(data.message == "Logout Successful") {
			navigate(data.redirect);
		}
	}).catch(error => { console.error('Logout Error', error); });
}