<?php
session_start();
error_reporting(0);
define('T_MYSQL_SERVER',  'localhost');             // MySQL: Server
			define('T_MYSQL_LOGIN',   'root');             // MySQL: Login
			define('T_MYSQL_PASSWORD','abcd');          // MySQL: Password
			define('T_MYSQL_DB_NAME', 'coaching_db');
			$dbconnect =mysqli_connect(T_MYSQL_SERVER,T_MYSQL_LOGIN,T_MYSQL_PASSWORD,T_MYSQL_DB_NAME) or die(mysqli_error());
?>
