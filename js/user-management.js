$(function () {

	$('#send-inivitation-btn').on('click', function () {
		var groupIds = [];
		$('.group-cb').each(function (index, element) {
			if($(element).prop('checked')) {
				groupIds.push($(element).attr('data-group'));
			}
		});
		var postData = {
			snKey: $('#sn-key').val(),
			groups: groupIds,
			emailTitle: $('#email-title').val(),
			emailContent: $('#email-content').val()
		};
		$.ajax({
			url: "experiments_invitations.php",
			type: "POST",
			data: postData,
			success: function (response) {
				var result = JSON.parse(response);
				alert(result.message);
			}
		});

	});

});