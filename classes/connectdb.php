<?php

/**
*  КЛАСС ДЛЯ СОЕДИНЕНИЯ С БАЗОЙ ДАННЫХ
*/

class connectDB {
	
	function __construct() {
		
		# НАСТРОЙКИ ДЛЯ ПОДКЛЮЧЕНИЯ К БД
		$dbhost = "localhost";
		$dbuser = "ivent";
		$dbpass = "ivent";
		$dbname = "ivent";

		# НИЧЕГО НЕ МЕНЯТЬ!
		$connect = mysql_connect($dbhost, $dbuser, $dbpass) or die("Не могу подключиться к серверу базы данных: ".$dbhost."<br>".mysql_error());

		if ($connect !== FALSE) {

			$select = mysql_select_db($dbname) or die("Не могу подключиться к базе данных: ".$dbname."<br>".mysql_error());

			if ($select !== FALSE) {

				mysql_set_charset("utf8");

			}

		}

	}
}

?>