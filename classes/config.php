<?php

# Время жизни сессии (30 минут)
ini_set('session.gc_maxlifetime', 1800);

# Время жизни cookie (30 минут)
ini_set('session.cookie_lifetime', 1800);

# Устанавливаем путь, для хранения файлов сессий
ini_set('session.save_path', $_SERVER['DOCUMENT_ROOT'].'/ivent/session/');

# Режим отладки
ini_set( "display_errors", true );

# Создаем файл сессии
session_start();


// Очистка файлов сессий
// Запуск происходит один раз в сутки в 00-00-00

# Задаем переменную, для хранения текущего времени
$time = date('H:m:s');

# Запускаем проверку
if ($time === '00:00:00') {

	# Устанавливаем папку для читски
	$dir = $_SERVER['DOCUMENT_ROOT'].'/ivent/session';

	# Задаем время жизни сессий за которое надо удалить файлы (12 часов)
	$todel = 43200;

	if($OpenDir = opendir($dir)) {

		while (($file = readdir($OpenDir)) !== FALSE) {
			
			if ($file != "." && $file != "..") {

				$dtime = intval(time() - filectime("{$dir}/{$file}"));

				if ($dtime >= $todel) unlink("{$dir}/{$file}");

			}

		}

		closedir($OpenDir);

	}

}

?>