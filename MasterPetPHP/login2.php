<?php
$login = "";
$senha = "";
$errorMessage = "";
$num_rows = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$login = $_POST['login'];
	$senha = $_POST['senha'];

	$login = htmlspecialchars($login);
	$senha = htmlspecialchars($senha);

	$user_name = "root";
	$pass_word = "";
	$database = "masterpetphp";
	$server = "localhost";

	$db_handle = mysql_connect($server, $user_name, $pass_word);
	$db_found = mysql_select_db($database, $db_handle);
	if ($db_found) {

		$login = quote_smart($login, $db_handle);
		$senha = quote_smart($senha, $db_handle);
		$SQL = "SELECT * FROM usuarios WHERE login = $login AND senha = $senha";
		$result = mysql_query($SQL);
		if ($result) {

			$num_rows = mysql_num_rows($result);
			if ($num_rows > 0) {

				session_start();
				$_SESSION['login'] = "1";
				header ("Location: home.php");

			}
			else {

				$errorMessage = "Invalid Login";
				session_start();
				$_SESSION['login'] = '';

			}
		}
		else {

		$errorMessage = "Error logging on";

		}

	}
	else {

		$errorMessage = "Error logging on";

	}
}


?>

