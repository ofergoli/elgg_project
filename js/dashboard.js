(function () {
	var csvDownloadBtn = $('#csv-download').hide(),
		csvImportBtn = $('#csv-import-btn').hide(),
		sqlDownloadBtn = $('#sql-download').hide(),
		overrideDataCb = $('#override-data-cb').hide(),
		snKey = $('input#sn-key').val(),
		inputFile = $('#upload-csv-file'),
		viewSnapshotButton = $('#view-snapshot-btn'),
		loadSnapshotButton = $('#load-snapshot-btn'),
		viewDatepicker = $('#view-datepicker'),
		loadDatepicker = $('#load-datepicker');

	$('.fa-spinner').hide();

	$('button#export-csv-btn').on('click', function () {
		csvDownloadBtn.hide();
		var spinner = $('#csv-download-spinner').show();
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
				}
			});
	});

	csvImportBtn.on('click', function () {
		var data = new FormData();
		data.append('zip_file', $('#upload-csv-file')[0].files[0]);
		data.append('snKey', $('#sn-key').val());
		data.append('overrideData', $('#override-data-cb input:checkbox').prop('checked'));
		$.ajax({
			url: 'backup_restore.php',
			data: data,
			cache: false,
			type: 'POST',
			contentType: false,
			processData: false,
			success: function () {
				alert("Successfully imported data to social network");
			}
		});
	});

	loadSnapshotButton.on('click', function () {
		if (!loadDatepicker.val() || loadDatepicker.val() === '' || loadDatepicker.val().split('-').length !== 3) {
			alert('Choose the date of snapshot you would like to load');
		}
		else {
			var snapshotData = {
				snapshotFilename: convertDateToFilename(loadDatepicker.val()),
				snKey: $('#sn-key').val()
			};
			$.ajax({
				type: 'POST',
				data: snapshotData,
				url: 'load_snapshot.php',
				success: function (response) {
					alert(response.message);
				},
				failure: function (error) {
					console.log(error);
				}
			});
		}
	});

	viewSnapshotButton.on('click', function () {
		if (!viewDatepicker.val() || viewDatepicker.val() === '' || viewDatepicker.val().split('-').length !== 3) {
			alert('Choose the date of snapshot you would like to view');
		}
		else {
			var snapshotData = {
				snapshotFilename: convertDateToFilename(viewDatepicker.val()),
				snKey: $('#sn-key').val()
			};
			$.ajax({
				type: 'POST',
				data: snapshotData,
				url: 'view_snapshot.php',
				success: function (response) {
					console.log(response);
				},
				failure: function (error) {
					console.log(error);
				}
			});

		}
	});

	function convertDateToFilename(date) {
		var asTokens = date.split('-');
		for (var i in asTokens) {
			if (asTokens[i].charAt(0) === '0') {
				asTokens[i] = asTokens[i].substr(1);
			}
		}
		return asTokens[2] + '_' + asTokens[1] + '_' + asTokens[0] + '.sql';
	}

})();