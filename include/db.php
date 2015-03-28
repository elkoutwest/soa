<?php
// cite http://www.phpgang.com/how-to-create-like-unlike-system-in-php-mysql-and-jquery_410.html
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'soa');
$connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>