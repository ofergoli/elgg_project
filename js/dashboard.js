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
            processData: false
        });
    });

	$( "#import_datepicker" ).datepicker();
	$( "#export_datepicker" ).datepicker();
})();