(function () {

	var csvDownloadBtn = $('#csv-download').hide(),
		csvImportBtn = $('#csv-import-btn').hide(),
		overrideDataCb = $('#override-data-cb').hide(),
		snKey = $('input#sn-key').val(),
		inputFile = $('#upload-csv-file');

	$('.fa-spinner').hide();

	$('button#export-db-btn').on('click', function () {
		csvDownloadBtn.hide();
		var spinner = $('div#export-container').find('.fa-spinner').show();
		$.post('backup_restore.php', {
			dbName: snKey
		}, function (data) {
			var result = JSON.parse(data);
			csvDownloadBtn.attr('href', result.url)
				.attr('download', result.filename)
				.show();
			spinner.hide();
		});
	});

	$('#upload-csv-btn').on('click', function () {
		inputFile.trigger('click')

			.change(function (e) {
				if (this.files.length > 0) {
					csvImportBtn.show();
					overrideDataCb.show();
					spinner.hide();
				}
			});
	});

	csvImportBtn.on('click', function () {
		$.post('backup_restore.php', {
			dbName: snKey,
			zipFile: inputFile.files[0],
			overrideData: overrideDataCb.children('input:checkbox').prop('checked')
		}, function (data) {
			console.log(JSON.stringify(data));
		});
	});

})();