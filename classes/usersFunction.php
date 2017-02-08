<?php

/**
* КЛАСС ДЛЯ РАБОТЫ С ПОЛЬЗОВАТЕЛЯМИ
*/

require_once("link.php");
new connectDB();

class usersFunction {
	
	# Добавление нового пользователя
	function addNewUser() {

	}

	# Редактирование пользователя
	function editUser() {

	}

	# Удаление пользователя
	function deleteUser() {

	}

	# Авторизазия пользователя
	function authUser() {

		$_SESSION['logInStatus'] = 'notLogIn';

		$login = $_POST['login'];
		$password = $_POST['password'];

		$query = mysql_query("SELECT * FROM users WHERE login='$login' AND password='$password'");

		if(mysql_num_rows($query) == 1) {

			$row = mysql_fetch_object($query);

			$_SESSION['userSurname'] = $row->surname;
			$_SESSION['userName'] = $row->name;
			$_SESSION['userPatronymic'] = $row->patronymic;

			unset($_SESSION['logInStatus']);

			$_SESSION['logInStatus'] = 'logIn';

		}

	}

	# Проверка авторизации пользователя
	function checkAuthUser() {

		if(!isset($_SESSION['logInStatus']) || $_SESSION['logInStatus'] == 'notLogIn') {

			header("Location: /ivent");
			exit();
		}
		else {

			if($_SESSION['logInStatus'] == 'logIn') {

				header("Location: /ivent/dashboard");

			}
			else {

				header("Location: /ivent");
				exit();

			}
		}
	}

	# Проверка авторизации пользователей на "закрытых" страницах
	function checkAuthOserOnPages() {

		if(!isset($_SESSION['logInStatus']) || $_SESSION['logInStatus'] == 'notLogIn') {

			header("Location: /ivent");
			exit();
			
		}

	}


	# Выход (Logout) из системы
	function logoutUser() {

		unset($_SESSION['userSurname']);
		unset($_SESSION['userName']);
		unset($_SESSION['userPatronymic']);
		unset($_SESSION['logInStatus']);

		session_destroy();

		header("Location /ivent/");

		exit();

	}
	
}

?>