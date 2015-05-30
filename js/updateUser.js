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
});
