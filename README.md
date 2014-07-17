php-archive-redirect
====================

Redirect deprecated links to an archive website

When a new website is deployed, it is sometimes required that old links still point to an archive website.
This script was written to address the problem of such redirection.

Usage:
* It can be used with conjunction with the Apache's .htaccess directive for redirection when no file or directory is found. 
* It can be used in your custom implementation: just redirect to 404.php with the query URI (see example.php)

Operation:
* .htaccess takes care that if file or directory is not found on the server it will redirect to 404.php script.
* 404.php script uses cURL to get request from the archive website, if a header 200 (Page Found) is returned from the archive website, the script will redirect to the archive website with the current URI, else it will redirect to static 404.html

Conditions:
* The archive website should return header 404 if the page does not exist and header 200 if exists.
