<?php

function build_csv($path, $tableData) {
	$dirname = dirname($path);
	if(!is_dir($dirname)) {
		mkdir($dirname, 0755, true);
	}
	$fp = fopen($path . '.csv', 'w');
	foreach($tableData as $row) {

		fputcsv($fp, $row);
	}
	fclose($fp);
}
