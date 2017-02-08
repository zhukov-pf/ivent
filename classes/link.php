<?php

# Соединение с БД
require_once("connectdb.php");

# Файл конфигураций
require_once("config.php");

# Класс для работы с пользователями
require_once("usersFunction.php");

# Класс для работы 


# Библиотека для работы с PDF
require_once($_SERVER['DOCUMENT_ROOT']."/ivent/library/fpdf/fpdf.php");


#===========================================#

if(isset($_POST['signIn'])) {

	usersFunction::authUser();
	usersFunction::checkAuthUser();

 }

?>