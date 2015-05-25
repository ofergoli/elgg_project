$(document).ready(function () {
	$(".delete-network-btn").click(function () {
		var md5_social_hash = $(this).parent().children(".hidden_input").val();
		bootbox.dialog({
			title: "Enter BGU.NET credentials :",
			message:
			'<form class="form-horizontal">' +
			'<div class="form-group">' +
			'<label for="username" class="col-md-4 control-label">Username:</label>' +
			'<div class="col-md-4">' +
			'<input id="username" name="name" type="text" placeholder="Username" class="form-control input-md" />' +
			'</div>' +
			'</div>' +
			'<div class="form-group">' +
			'<label for="password" class="col-md-4 control-label">Password:</label>' +
			'<div class="col-md-4">' +
			'<input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" />' +
			'</div>' +
			'</div>' +
			'<div class=form-group>' +
			'<div class="col-md-offset-2 col-md-8">' +
			'<span id="im_note">' +
			'<i class="glyphicon glyphicon-warning-sign"></i> Warning - This action will permanently delete the social network and all its data!' +
			'</span>' +
			'</div>' +
			'</div>' +
			'</form>'
			,buttons: {
				fail: {
					label: "Cancel",
					className: "btn btn-primary"
				},
				success: {
					label: "Delete Social Network",
					className: "btn btn-danger",
					callback: function () {
						$("#spinner").show();
						var username = $('#username').val();
						var password = $('#password').val();
						var data = {
							username: username,
							password: password,
							hash: md5_social_hash
						};
						$.ajax({
							url: "delete_social_network.php",
							type: "POST",
							data: data,
							success: function (result) {
								alert("Sucssues!");
								$("#spinner").hide();
								if (result.status == "success")
									window.location.replace("my_social_networks.php");
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

