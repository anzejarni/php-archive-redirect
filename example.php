<?php
//Use this code in you php file for custom implementation
$page_not_found = true;
$request_uri = $_SERVER['REQUEST_URI'];


if ($page_not_found)
{
	header("HTTP/1.1 303 See Other");
	header("Location: /404.php?uri=$request_uri");
	exit(0);
}

?>
