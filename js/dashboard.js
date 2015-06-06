(function () {
	var csvDlBtn = $('#csv-download').hide();
	var spinner = $('.fa-spinner').hide();
	$('button#export-db').on('click', function (e) {
		spinner.show();
		$.post('backup_restore.php', {dbName: $('input#sn-key').val()}, function (data) {
			var result = JSON.parse(data);
			csvDlBtn.attr('href', result.url)
				.attr('download', result.filename)
				.show();
			spinner.hide();
		});
	});
})();