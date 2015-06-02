$(function () {
	$('#change-password-btn').click(function () {
		bootbox.dialog({
			title: "Change User Password:",
			message: '<form class="form-horizontal" data-toggle="validator">' +
			'<div class="form-group">' +
			'<label for="oldPassword" class="col-md-4 control-label">Old Password:</label>' +
			'<div class="col-md-4">' +
			'<input id="oldPassword" name="oldPassword" type="password" placeholder="Old Password" class="form-control input-md" />' +
			'</div>' +
			'</div>' +
			'<div class="form-group">' +
			'<label for="newPassword" class="col-md-4 control-label">New Password:</label>' +
			'<div class="col-md-4">' +
			'<input id="newPassword" name="newPassword" type="password" placeholder="New Password" class="form-control input-md" />' +
			'</div>' +
			'</div>' +
			'<div class="form-group">' +
			'<label for="confirmPassword" class="col-md-4 control-label">Confirm New Password:</label>' +
			'<div class="col-md-4">' +
			'<input id="confirmPassword" type="password" placeholder="Confirm New Password" class="form-control input-md" ' +
			'data-match="#newPassword" ' +
			'data-match-error="Passwords don\'t match" required />' +
			'<div class="help-block with-errors"></div>' +
			'</div>' +
			'</div>' +
			'</form>'
			, buttons: {
				fail: {
					label: "Cancel",
					className: "btn btn-primary"
				},
				success: {
					label: "Change Password",
					className: "btn btn-danger",
					callback: function () {
						$("#spinner").show();
						var oldPassword = $('#oldPassword').val();
						var newPassword = $('#newPassword').val();
						var data = {
							oldPassword: oldPassword,
							newPassword: newPassword
						};
						$.ajax({
							url: "userProfile.php",
							type: "POST",
							data: data,
							success: function (result) {
								$("#spinner").hide();
								if (result.status == "success")
									window.location.replace("userProfile.php");
								else {
									alert(result.status);
								}
							}
						});
					}
				}
			}
		});
	});

	$('#change-email-btn').click(function () {
		bootbox.dialog({
			title: "Change User Email:",
			message: '<form class="form-horizontal" data-toggle="validator">' +
			'<div class="form-group">' +
			'<label for="password" class="col-md-4 control-label">Password:</label>' +
			'<div class="col-md-4">' +
			'<input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" />' +
			'</div>' +
			'</div>' +
			'<div class="form-group">' +
			'<label for="newEmail" class="col-md-4 control-label">New Email:</label>' +
			'<div class="col-md-4">' +
			'<input id="newEmail" name="newEmail" type="email" placeholder="New Email" class="form-control input-md" />' +
			'</div>' +
			'</div>' +
			'</form>'
			, buttons: {
				fail: {
					label: "Cancel",
					className: "btn btn-primary"
				},
				success: {
					label: "Change Email",
					className: "btn btn-danger",
					callback: function () {
						$("#spinner").show();
						var password = $('#password').val();
						var newEmail = $('#newEmail').val();
						var data = {
							oldPassword: password,
							newPassword: newEmail
						};
						$.ajax({
							url: "userProfile.php",
							type: "POST",
							data: data,
							success: function (result) {
								$("#spinner").hide();
								if (result.status == "success")
									window.location.replace("userProfile.php");
								else {
									alert(result.status);
								}
							}
						});
					}
				}
			}
		});
	});
});
