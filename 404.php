<?php
//Change the $archive_root_url to your archive website
$archive_root_url = 'http://archive.example.com';	
$current_root_url = $_SERVER['SERVER_NAME'];

if (isset($_REQUEST['uri']))
{
	$archive_url = $archive_root_url.$_SERVER['uri'];
	
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $archive_url);
	curl_setopt($curl, CURLOPT_FILETIME, true);
	curl_setopt($curl, CURLOPT_NOBODY, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$header = curl_exec($curl);
	$info = curl_getinfo($curl);
	curl_close($curl);
}	

if (isset($info))
{
	if ($info['http_code'] == '200')
		$redirect_url = $archive_url;
	else
		$redirect_url = $current_root_url.'/404.html';
}
else
	$redirect_url = $current_root_url;

header("HTTP/1.1 303 See Other");
header("Location: $redirect_url");
exit(0);

?>
