<?php
	$conexao = mysql_connect("localhost","root",""); 
	if (!$conexao){
		echo "Erro ao se conectar MySql <br/>" ; 
		exit;
	}
	$banco  = mysql_select_db("masterpetphp");
	if (!$banco){
		echo "Erro ao se conectar ao banco masterpetphp...";
		exit;
	}
	//recuperar valores do formulário
	$id = trim($_POST['id']);
	
	if (!empty($id)){
		$query = "DELETE FROM clientes where id='$id';";
		$rmv = mysql_query($query);
		if ($rmv==false)
			$msg = "erro na Remoção de Clientes " . mysql_error . "<br/>"; 
		else {
			$msg = "Foi Removido com Sucesso!" . mysql_affected_rows() . "registros no banco masterpetphp <br/>";
			unset ($id);
		}
	}
	else $msg = "Existe variaveis em branco...";
	
	echo $msg;
	header ("location: listarClientes.php")
?>