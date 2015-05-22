<?php
//do post object use in order to make the installtion automaticlly
function doPost($parameters, $url)
{
	$options = array(
		'http' => array(
			'header' => "Content-type: application/x-www-form-urlencoded\r\n",
			'method' => 'POST',
			'content' => http_build_query($parameters),
		),
	);
	$context = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
}

?>